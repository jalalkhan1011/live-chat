<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('123456789'),
                'created_at' => now()
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456789'),
                'created_at' => now()
            ],
            [
                'name' => 'Test',
                'email' => 'test@test.com',
                'password' => Hash::make('123456789'),
                'created_at' => now()
            ],
        ];
        DB::table('users')->insert($data);
    }
}
