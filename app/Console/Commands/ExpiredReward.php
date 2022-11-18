<?php

namespace App\Console\Commands;

use App\Models\Reward;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpiredReward extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:rewardexpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expired reward after one year';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
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
