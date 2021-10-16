<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
            'name' => 'Astract Admin',
            'email' => 'admin@astract.test',
            'username' => 'admin',
            'password' => Hash::make('adminpassword'),
            'status' => 'admin'
        ]);
        
    }
}
