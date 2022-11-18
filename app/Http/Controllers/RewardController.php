<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index(Request $request){  

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email'); 
       
        $rewards = Reward::select(
                'rewards.*',
                'rewards.id as id_reward',
                'users.id as id_user',
                'users.name as user_name'
            )
            ->join('users','rewards.user_id','=','users.id')
            ->orderBy('id','desc')
            ->get();

        return view('reward',
                    [
                        'applications' => 'applications',
                        'rewards'       => $rewards
                            
                    ]
                );
    }

    public function fetchEditDelete(Request $request){
        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  
        $reward_id   = $request->get('reward_id'); 

        $rewards = Reward::where('id','=',$reward_id)->get();
        return json_encode($rewards);
    }

    public function update(Request $request){

        $user_id    = $request->session()->get('user_id');
        $name       = $request->session()->get('name'); 
        $email      = $request->session()->get('email');  

        $reward_id           = $request->get('reward_id_update');
        $status               = $request->get('status_update'); 
        
        if($status == 'EXPIRED' ){
           
            Reward::where('id',$reward_id)
                ->update(
                            [   
                                'reward_status' => 'EXPIRED', 
                                'reward_active' => 'INACTIVE',
                                'reward_used'   => 'UNUSED'
                            ]
            ); 
            return redirect('/rewards');

        } else if($status == 'ACTIVATE'){
            
            Reward::where('id',$reward_id)
                ->update(
                            [   
                                'reward_status' => 'ELIGIBLE', 
                                'reward_active' => 'ACTIVE',
                                'reward_used'   => 'UNUSED'
                            ]
            ); 
            return redirect('/rewards');

        }

        

        
    }

    public function findExpired(Request $request){

        $rewards = Reward::where('reward_status','ELIGIBLE')->get();
        if(count($rewards) > 0){
            foreach($rewards as $reward){

                $reward_id = $reward->id; 
                $reward_dt = $reward->reward_dt;

                $reward_dt_1             = date('Y-m-d', strtotime($reward_dt));    

                $absolute       = false;
                $expired_diff   = Carbon::parse($reward_dt_1); 
                $result         = $expired_diff->diffInDays(Carbon::now()->format('Y-m-d'), $absolute); 

                if($result >= 365 ) { 

                    Reward::where('id',$reward_id)
                        ->update(
                                    [   
                                        'reward_status' => 'EXPIRED', 
                                        'reward_active' => 'INACTIVE',
                                        'reward_used'   => 'UNUSED'
                                    ]
                    ); 
                   

                } else { 

                     

                } 

            }
        }  
        exit;

    }
}
