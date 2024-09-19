<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')
            ->insert([
                [
                    'email' => 'user1@gmail.com',
                    'name' => 'user1',
                    'password' => Hash::make('admin123123'),
                    'points' => 100,
                    'role' => 'patient'
                ],
                [
                    'email' => 'user2@gmail.com',
                    'name' => 'user2',
                    'password' => Hash::make('admin123123'),
                    'points' => 100,
                    'role' => 'patient'
                ],
                [
                    'email' => 'user3@gmail.com',
                    'name' => 'user3',
                    'password' => Hash::make('admin123123'),
                    'points' => 100,
                    'role' => 'patient'
                ],
                [
                    'email' => 'user4@gmail.com',
                    'name' => 'user4',
                    'password' => Hash::make('admin123123'),
                    'points' => 100,
                    'role' => 'patient'
                ],
                [
                    'email' => 'user5@gmail.com',
                    'name' => 'user5',
                    'password' => Hash::make('admin123123'),
                    'points' => 100,
                    'role' => 'patient'
                ],
                [
                    'email' => 'user6@gmail.com',
                    'name' => 'user6',
                    'password' => Hash::make('admin123123'),
                    'points' => 100,
                    'role' => 'patient'
                ]
            ]);
    }
}
