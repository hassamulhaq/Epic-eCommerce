<?php

namespace Database\Seeders;

use App\Helpers\UserHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::unguard();


        DB::table('users')->insert([
//            [
//                'id' => UserHelper::ROLE_GUEST, // don't change id, it used as guest_id in UserHelper.php
//                'uuid' => UserHelper::ROLE_GUEST_UUID,
//                'role_id' => null,
//                'first_name' => 'guest',
//                'last_name' => 'user',
//                'username' => 'guest',
//                'email' => 'guest@example.com',
//                'password' => Hash::make('password')
//            ],
            [
                'id' => UserHelper::ROLE_SUPER_ADMIN,
                'uuid' => UserHelper::ROLE_SUPER_ADMIN_UUID,
                'role_id' => UserHelper::ROLE_SUPER_ADMIN,
                'first_name' => 'hassam',
                'last_name' => null,
                'username' => 'hassam',
                'email' => 'devhassam@yahoo.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => UserHelper::ROLE_ADMIN,
                'uuid' => UserHelper::ROLE_ADMIN_UUID,
                'role_id' => UserHelper::ROLE_ADMIN,
                'username' => 'admin',
                'first_name' => 'admin',
                'last_name' => null,
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => UserHelper::ROLE_CUSTOMER,
                'uuid' => UserHelper::ROLE_CUSTOMER_UUID,
                'role_id' => UserHelper::ROLE_CUSTOMER,
                'username' => 'customer',
                'first_name' => 'customer',
                'last_name' => null,
                'email' => 'customer@example.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
