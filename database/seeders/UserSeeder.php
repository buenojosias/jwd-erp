<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Josias Bueno',
            'email' => 'josias@email.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
