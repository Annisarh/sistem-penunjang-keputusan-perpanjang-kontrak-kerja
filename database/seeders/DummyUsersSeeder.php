<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'admin'
            ],
            [
                'nama' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'user'
            ],
            [
                'nama' => 'kepala cabang',
                'email' => 'kepalacabang@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'kepala cabang'
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
