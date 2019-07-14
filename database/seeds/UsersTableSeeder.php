<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@comovoto.com.ar'
        ], [
            'password' => Hash::make('123456'),
            'name' => 'Admin',
            'api_token' => 'Y07KH9uNEGrPafm808BTUy2hFKA2GN2s0wAo1XMb0clHoru32QyTAmmeoEdN',
            'role_id' => 1,
        ]);
    }
}
