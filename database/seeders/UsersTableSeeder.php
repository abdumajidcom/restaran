<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'phone' => '998901111111',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'User1',
                'email' => 'user1@mail.com',
                'phone' => '998902222222',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
