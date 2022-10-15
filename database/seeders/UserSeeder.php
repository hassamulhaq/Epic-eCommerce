<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'uuid' => Str::uuid()->toString(),
                'role_id' => 1,
                'first_name' => 'hassam',
                'last_name' => null,
                'username' => 'hassam',
                'email' => 'devhassam@yahoo.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 2,
                'uuid' => Str::uuid()->toString(),
                'role_id' => 2,
                'username' => 'admin',
                'first_name' => 'admin',
                'last_name' => null,
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 3,
                'uuid' => Str::uuid()->toString(),
                'role_id' => 3,
                'username' => 'customer',
                'first_name' => 'customer',
                'last_name' => null,
                'email' => 'customer@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 4, // don't change id, it used as guest_id in UserHelper.php
                'uuid' => Str::uuid()->toString(),
                'role_id' => 4,
                'first_name' => 'guest',
                'last_name' => 'user',
                'username' => 'guest',
                'email' => 'guest@example.com',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
