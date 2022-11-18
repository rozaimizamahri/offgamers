<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::insert(
            array(
                [ 
                    'id'               => 1, 
                    'order_id'         => 1,
                    'user_id'          => 1,

                    'payment_amount'    => '10',
                    'payment_status'    => 'PENDING',
                    'payment_by'        => 1,
                    'payment_dt'        => '2022-11-18 15:30:30'
                ],
                [ 
                    'id'               => 2, 
                    'order_id'         => 2,
                    'user_id'          => 2,

                    'payment_amount'    => '10',
                    'payment_status'    => 'PENDING',
                    'payment_by'        => 2,
                    'payment_dt'        => '2022-11-18 15:30:30'
                ],
            )
        );
    }
}
