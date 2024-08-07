<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    public function run(): void
    {
        $wallets = [
            ['name' => 'Dinheiro', 'balance' => 22],
            ['name' => 'Nubank', 'balance' => 204.5],
            ['name' => 'Caixa', 'balance' => 18.94],
        ];

        Wallet::insert($wallets);
    }
}
