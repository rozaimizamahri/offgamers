<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            array(
                [ 
                    'id'               => 1 ,
                    'name'             => 'Micheal' ,
                    'email'            => 'micheal@mail.com',
                    'password'         => 'micheal123',

                    'active'           => 'Y',
                    'last_login'       => '2022-11-18 10:10:10',
                    'last_logout'      => '2022-11-18 10:10:10',

                    'created_by_name'  => 'Micheal',
                    'created_by_email' => 'micheal@mail.com',
                    'created_by_date'  => '2022-11-18 10:10:10',
                    'created_remark'   => '',
                    'updated_status'   => 'N',
                    'updated_count'    => '0',
                    'updated_by_name'  => 'Micheal',
                    'updated_by_email' => 'micheal@mail.com',
                    'updated_by_date'  => '2022-11-18 10:10:10',
                    'updated_remark'   => ''
                ],
                [ 
                    'id'               => 2 ,
                    'name'             => 'Sarah' ,
                    'email'            => 'sarah@mail.com',
                    'password'         => 'sarah123',

                    'active'           => 'Y',
                    'last_login'       => '2022-11-18 10:10:10',
                    'last_logout'      => '2022-11-18 10:10:10',

                    'created_by_name'  => 'Sarah',
                    'created_by_email' => 'sarah@mail.com',
                    'created_by_date'  => '2022-11-18 10:10:10',
                    'created_remark'   => '',
                    'updated_status'   => 'N',
                    'updated_count'    => '0',
                    'updated_by_name'  => 'Sarah',
                    'updated_by_email' => 'sarah@mail.com',
                    'updated_by_date'  => '2022-11-18 10:10:10',
                    'updated_remark'   => ''
                ]
            )
        );
    }
}
