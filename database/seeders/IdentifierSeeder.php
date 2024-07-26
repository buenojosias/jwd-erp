<?php

namespace Database\Seeders;

use App\Models\Identifier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentifierSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Cliente'],
            ['title' => 'Igreja'],
            ['title' => 'Aula'],
            ['title' => 'Mercado'],
            ['title' => 'Combustível'],
        ];

        Identifier::insert($items);
    }
}
