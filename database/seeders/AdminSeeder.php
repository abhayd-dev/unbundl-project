<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@unbundl.com',
            'phone' => '9876543210',
            'address' => 'Admin HQ, Delhi',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}
