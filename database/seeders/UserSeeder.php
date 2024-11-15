<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

// initial data for user login
class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
    }
}

