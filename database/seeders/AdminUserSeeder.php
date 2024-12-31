<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'systemadmin@med.com',
            'password' => Hash::make('medicaladmin'), // Replace 'password' with your desired password
            'role' => 'admin', // Assign the 'admin' role
        ]);
    }
}
