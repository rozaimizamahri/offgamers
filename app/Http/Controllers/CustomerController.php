<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Reward;
use App\Models\User;
use Carbon\Carbon; 

class CustomerController extends Controller
{
    public function index(Request $request){  

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 
       
        $customers = User::orderBy('id','desc')->get();

        return view('customer',
                    [
                        'applications' => 'applications',
                        'customers'       => $customers
                            
                    ]
                );
    }

    public function create(Request $request){
 
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');

        $name2           = $request->get('name_create');
        $email2           = $request->get('email_create');
        $password2           = $request->get('password_create');

        User::insert([  
            'name'                  => $name2, 
            'email'                 => $email2,
            'password'              => $password2,
            'active'	            => 'Y',
            'created_by_name'	    => $name,
            'created_by_email'	    => $email,
            'created_by_date' 	    => now(),
            'updated_status' 	    => 'N',
            'updated_count' 	    => '0'
        ]); 

        return redirect('/customers');
    }

    public function fetch(Request $request){ 
            
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 

        $users = User::get();
        return json_encode($users, true);

    } 

    public function fetchEditDelete(Request $request){
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  
        $customer_id   = $request->get('customer_id');  

        $customers = User::where('id',$customer_id) ->get();
        return json_encode($customers); 
    }

    public function update(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $customer_id    = $request->get('customer_id_update');
        $name           = $request->get('name_update');
        $email          = $request->get('email_update');
        $password       = $request->get('password_update');
        $active         = $request->get('active_update'); 

        User::where('id',$customer_id)
            ->update(
                        [   
                            'name'        => $name, 
                            'email'      => $email,
                            'password'      => $password,
                            'active'      => $active
                        ]
        );  

        return redirect('/customers');
    }

    public function delete(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $customer_id           = $request->get('customer_id_delete');  

        Reward::where('user_id',$customer_id)->delete();   

        Payment::where('user_id',$customer_id)->delete();

        Order::where('user_id',$customer_id)->delete();   

        User::where('id',$customer_id)->delete();   

        return redirect('/customers');
    }
}
