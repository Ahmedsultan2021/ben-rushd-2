<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    
        User::create([
            'fname' => 'Admin2',
            'lname' => 'Lastname',
            'mobile' => '9876543210',
            'email' => 'admin2@example.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'fname' => 'SuperAdmin1',
            'lname' => 'Lastname',
            'mobile' => '5555555555',
            'email' => 'superadmin1@example.com',
            'role' => 'superadmin',
            'password' => Hash::make('superpassword'),
        ]);
    }
}
