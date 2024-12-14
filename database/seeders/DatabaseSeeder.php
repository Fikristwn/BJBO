<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Skripsi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
/*
         User::create([
            'name' => 'M FIkri Setiawan',
            'email' => 'fikri@gmail.com',
            'password' => bcrypt('123456789'),
            
        ]);
 */
        Admin::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        
       
    }
}
