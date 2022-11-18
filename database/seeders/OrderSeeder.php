<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Order::insert(
            array(
                [ 
                    'id'                => 1,  
                    'user_id'           => 1,

                    'refno'              => 'OG001',
                    'name'              => 'Earphone',
                    'amount'            => 10,
                    'status'            => 'PENDING',
                    'submit_by'         => 1,
                    'submit_dt'         => '2022-11-18 15:30:30'
                ],
                [ 
                    'id'                => 2,  
                    'user_id'           => 2,

                    'refno'              => 'OG002',
                    'name'              => 'Laptop',
                    'amount'            => 10,
                    'status'            => 'PENDING',
                    'submit_by'         => 2,
                    'submit_dt'         => '2022-11-18 15:30:30'
                ],
            )
        );
    }
}
