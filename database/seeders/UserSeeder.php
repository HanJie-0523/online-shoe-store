<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make('admin'),
            'address'=>'1234, Lorong Admin, Taman Admin, 10000, Bukit Admin, Pulau Admin',
            'contact'=>'0123456789',
        ])->roles()->attach(1);
    }
}
