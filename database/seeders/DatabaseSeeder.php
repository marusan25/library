<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * https://readouble.com/laravel/11.x/ja/hashing.html
     */
    public function run(): void
    {
        User::create([
            'name' => 'テストユーザー',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0
        ]);
    }
}
