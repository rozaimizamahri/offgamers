<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){  

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 
       
        $payments = Payment::select(
                'payments.*',
                'payments.id as id_payment',
                'users.id as id_user',
                'users.name as user_name',
                'orders.id as id_order',
                'orders.refno'
            )
            ->join('users','payments.user_id','=','users.id')
            ->join('orders','payments.order_id','=','orders.id')
            ->orderBy('id','desc')
            ->get();

        return view('payment',
                    [
                        'applications' => 'applications',
                        'payments'       => $payments
                            
                    ]
                );
    }
}
