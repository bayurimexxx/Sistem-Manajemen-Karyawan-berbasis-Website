<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Karyawan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


public function run(): void
{
    Admin::create([
        'name' => 'Super Admin',
        'email' => 'admin@demo.com',
        'password' => Hash::make('password123'),
    ]);

    Manager::create([
        'name' => 'Manager Demo',
        'email' => 'manager@demo.com',
        'password' => Hash::make('password123'),
    ]);

    Karyawan::create([
        'name' => 'Karyawan Demo',
        'email' => 'karyawan@demo.com',
        'password' => Hash::make('password123'),
    ]);
}

    }