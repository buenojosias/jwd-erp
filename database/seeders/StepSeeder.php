<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    public function run(): void
    {
        Step::factory(rand(1,3))->create();
    }
}
