<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Reward;
use App\Models\User;
use App\Models\Exchange;
use Carbon\Carbon; 

class HomeController extends Controller
{
    public function index(Request $request){  

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 
       
        $orders = Order::select(
                'orders.*',
                'orders.id as id_order',
                'users.id',
                'users.name as user_name'
            )
            ->join('users', 'orders.user_id','=','users.id')
            ->orderBy('orders.id','desc')
            ->get();

        return view('home',
                    [
                        'applications' => 'applications',
                        'orders'       => $orders
                            
                    ]
                );
    }

    public function create(Request $request){
 
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $name               = $request->get('name_create');
        $customer           = $request->get('customer_create');
        $currency           = $request->get('currency_create'); // ID : 1
        $amount             = $request->get('amount_create'); 

        $exchanges = Exchange::where('id',$currency)->first(); 

        $refno = 'OG'.substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 6); 
        
        $total = 0;
        if($currency !== 'USD' ){
            $total = $amount / $exchanges->exchange_rate;
        } else {
            $total = $amount; 
        }

        $orders = Order::insertGetId([
            'user_id' 		    => $customer,
            'refno' 		    => $refno,
            'name' 				=> $name,
            'amount' 			=> number_format($total,2),
            'status'			=> 'PENDING',
            'submit_by' 	    => $user_id,
            'submit_dt'         => Carbon::now()
        ]);

        Reward::insert([ 
            'order_id' 		    => $orders,
            'user_id' 		    => $customer, 
            'reward_refno'      => $refno,
            'reward_amount'     => number_format($total,0),
            'reward_status'	    => 'ELIGIBLE',
            'reward_active'	    => 'INACTIVE',
            'reward_used' 	    => 'UNUSED'
        ]); 

        return redirect('/home');
    }

    public function fetch(Request $request){ 
            
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 

        $users = User::get();
        return json_encode($users, true);

    }

    public function fetchReward(Request $request){ 
            
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 

        $user_id   = $request->get('user_id'); 

            $rewards = Reward::where('user_id',$user_id)
            ->where('reward_status','ELIGIBLE')
            ->where('reward_active','ACTIVE')
            ->where('reward_used','UNUSED')
            ->get();
    
            $sum = 0;
            foreach($rewards as $reward)
            {
                $sum+= $reward->reward_amount; 
            } 

        return json_encode($sum, true);

    }   

    public function fetchEditDelete(Request $request){
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  
        $order_id   = $request->get('order_id'); 

        // $orders = Order::where('id','=',$order_id)
        //             ->join('')
        //             ->get();

        $orders = Order::select(
            'orders.*',
            'orders.id as id_order',
            'orders.name as order_name',
            'users.id as user_id',
            'users.name as user_name'
        )
        ->join('users', 'orders.user_id','=','users.id')
        ->where('orders.id',$order_id)
        ->orderBy('orders.id','desc')
        ->get();

        return json_encode($orders);
    }

    public function update(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $order_id           = $request->get('order_id_update');
        $name               = $request->get('name_update');
        $customer           = $request->get('customer_update'); 
        $currency           = $request->get('currency_update');
        $amount             = $request->get('amount_update');
        
        $exchanges = Exchange::where('id',$currency)->first(); 

        $total = 0;
        if($currency !== 'USD' ){
            $total = $amount / $exchanges->exchange_rate;
        } else {
            $total = $amount; 
        }

        $orders = Order::where('id',$order_id)
            ->update(
                        [   
                            'name'        => $name, 
                            'amount'      => number_format($total,2),
                            'submit_by'   => $user_id,
                            'submit_dt'   => Carbon::now()
                        ]
        );  
        
        Reward::insert([ 
            'order_id' 		    => $orders,
            'user_id' 		    => $customer, 
            'reward_amount'     =>number_format($total,0),
            'reward_status'	    => 'ELIGIBLE',
            'reward_active'	    => 'INACTIVE',
            'reward_used' 	    => 'UNUSED'
        ]); 

        return redirect('/home');
    }

    public function delete(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $order_id           = $request->get('order_id_delete');  

        Reward::where('order_id',$order_id)->delete();   

        Payment::where('order_id',$order_id)->delete();

        Order::where('id',$order_id)->delete();   

        return redirect('/home');
    }

    public function checkout(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $order_id       = $request->get('order_id_checkout');  
        $name           = $request->get('name_checkout');  
        $customer       = $request->get('customer_checkout');  
       
        $amount_checkout    = $request->get('amount_checkout'); 
        $reward_amount      = $amount_checkout * 0.01;

        $point_checkout     = $request->get('point_checkout');   // rewards points avaible
        $discount_checkout  = $request->get('discount_checkout'); 
        $total_checkout     = $request->get('total_checkout'); 
       
        $orders = Order::where('id',$order_id)
        ->update(
                    [   
                        'status'      => 'COMPLETED'
                    ]
        );  
       
        $payments = Payment::insertGetId([
            'order_id' 		    => $order_id,
            'user_id' 		    => $customer, 
            'payment_amount'    => $amount_checkout,
            'payment_discount'  => $discount_checkout,
            'payment_paid'      => $total_checkout,
            'payment_status'	=> 'COMPLETED',
            'payment_by' 	    => $user_id,
            'payment_dt'        => Carbon::now()
        ]);  

        $rewards = Reward::where('user_id',$customer)
            ->where('reward_status','ELIGIBLE')
            ->where('reward_active','ACTIVE')
            ->where('reward_used','UNUSED')
            ->update(
                        [   
                            'reward_used'   => 'USED',
                            'reward_dt'     =>  Carbon::now()
                        ]
            ); 

        $rewards = Reward::where('order_id',$order_id)
            ->update(
                        [   
                            'payment_id'    => $payments,
                            'reward_status' => 'ELIGIBLE',
                            'reward_active' => 'ACTIVE',
                            'reward_used'   => 'UNUSED',
                            'reward_dt'     =>  Carbon::now()
                        ]
            );  

        return redirect('/home');
    }
}
