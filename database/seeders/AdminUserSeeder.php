<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jerry Sanguyo',
            'email' => 'jsanguyo1624@gmail.com',
            'password' => bcrypt('adminpassword'),
            'type' => 'admin',
        ]);
        
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'type' => 'user',
        ]);
    }
}
