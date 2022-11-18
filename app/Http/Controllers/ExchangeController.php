<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchange;

class ExchangeController extends Controller
{
    public function index(Request $request){  

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 
       
        $exchanges = Exchange::orderBy('id','desc')->get();

        return view('exchange',
                    [ 
                        'exchanges'       => $exchanges
                            
                    ]
                );
    }

    public function create(Request $request){
 
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');

        $exchange_name           = $request->get('exchange_name_create');
        $exchange_desc           = $request->get('exchange_desc_create');
        $exchange_rate           = $request->get('exchange_rate_create');

        Exchange::insert([  
            'primary_rate'        => 1.00,
            'exchange_name'       => $exchange_name,
            'exchange_desc'       => $exchange_desc,
            'exchange_rate'       => $exchange_rate,
            'exchange_status'     => 'Y', 
            'exchange_by'         => 1,
            'exchange_dt'         => now() 
        ]); 

        return redirect('/exchanges');
    }

    public function fetch(Request $request){ 
            
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 

        $exchanges = Exchange::where('exchange_status','Y')->get();
        return json_encode($exchanges, true);

    } 

    public function fetchEditDelete(Request $request){
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  
        $exchange_id   = $request->get('exchange_id');  

        $exchanges = Exchange::where('id',$exchange_id) ->get();
        return json_encode($exchanges); 
    }

    public function update(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $exchange_id    = $request->get('exchange_id_update'); 

        $exchange_name           = $request->get('exchange_name_update');
        $exchange_desc           = $request->get('exchange_desc_update');
        $exchange_rate           = $request->get('exchange_rate_update');
        $exchange_status         = $request->get('exchange_status_update');


        Exchange::where('id',$exchange_id)
            ->update(
                        [    
                            'exchange_name'       => $exchange_name,
                            'exchange_desc'       => $exchange_desc,
                            'exchange_rate'       => $exchange_rate,
                            'exchange_status'     => $exchange_status, 
                            'exchange_by'         => 1,
                            'exchange_dt'         => now() 
                        ]
        );  

        return redirect('/exchanges');
    }

    public function delete(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $exchange_id           = $request->get('exchange_id_delete');    
        Exchange::where('id',$exchange_id)->delete();   
        return redirect('/exchanges');
    }
}
