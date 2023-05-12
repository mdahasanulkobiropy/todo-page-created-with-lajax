<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' => 'user3',
            'email' => 'user3@gmail.com',
            'password' => '12345678'
        ]);
        User::insert([
            'name' => 'user4',
            'email' => 'user4@gmail.com',
            'password' => '12345678'
        ]);
    }
}
