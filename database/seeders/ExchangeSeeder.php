<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exchange;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exchange::insert(
            array(
                [  
                    'id'                  => 1,  
                    'primary_rate'        => 1.00,
                    'exchange_name'       => 'MYR',
                    'exchange_desc'       => 'Malaysian Ringgit',
                    'exchange_rate'       => 4.55,
                    'exchange_status'     => 'Y', 
                    'exchange_by'         => 1,
                    'exchange_dt'         => '2022-11-18 15:30:30'
                ],
                [  
                    'id'                  => 2,  
                    'primary_rate'        => 1.00,
                    'exchange_name'       => 'IND',
                    'exchange_desc'       => 'Indonesian Rupiah',
                    'exchange_rate'       => 15660.04,
                    'exchange_status'     => 'Y', 
                    'exchange_by'         => 1,
                    'exchange_dt'         => '2022-11-18 15:30:30'
                ],
                [  
                    'id'                  => 3,  
                    'primary_rate'        => 1.00,
                    'exchange_name'       => 'YEN',
                    'exchange_desc'       => 'Japanese Yen',
                    'exchange_rate'       => 139.82,
                    'exchange_status'     => 'Y', 
                    'exchange_by'         => 1,
                    'exchange_dt'         => '2022-11-18 15:30:30'
                ],
                [  
                    'id'                  => 4,  
                    'primary_rate'        => 1.00,
                    'exchange_name'       => 'USD',
                    'exchange_desc'       => 'US Dollar',
                    'exchange_rate'       => 1.00,
                    'exchange_status'     => 'Y', 
                    'exchange_by'         => 1,
                    'exchange_dt'         => '2022-11-18 15:30:30'
                ]
            )
        );
    }
}
