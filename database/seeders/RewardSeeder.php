<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reward::insert(
            array(
                [ 
                    'id'               => 1,
                    'payment_id'       => 1,
                    'order_id'         => 1,
                    'user_id'          => 1,

                    'reward_refno'     => 'POINT001',
                    'reward_amount'    => '10',
                    'reward_status'    => 'ELIGIBLE',
                    'reward_active'    => 'INACTIVE',
                    'reward_used'      => 'UNUSED',
                    'reward_by'        => 1,
                    'reward_dt'        => '2022-11-18 15:30:30'
                ],
                [ 
                    'id'               => 2,
                    'payment_id'       => 2,
                    'order_id'         => 2,
                    'user_id'          => 2,

                    'reward_refno'     => 'POINT001',
                    'reward_amount'    => '10',
                    'reward_status'    => 'ELIGIBLE',
                    'reward_active'    => 'INACTIVE',
                    'reward_used'      => 'UNUSED',
                    'reward_by'        => 2,
                    'reward_dt'        => '2022-11-18 15:30:30'
                ],
            )
        );
    }
}
