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
            'fname' => 'أحمد',
            'lname' => 'سلطان',
            'mobile' => '1234567890',
            'email' => 'sultan@example.com',
            'role' => 'admin',
            'password' => Hash::make('123456'), 
        ]);
    }
}
