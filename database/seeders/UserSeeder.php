<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Josias Bueno',
            'email' => 'josias.jpb@gmail.com',
            'password' => bcrypt('JPB2019'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
