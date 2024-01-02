<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallets = [
            ['name' => 'Dinheiro', 'amount' => 22],
            ['name' => 'Nubank', 'amount' => 204.5],
            ['name' => 'Caixa', 'amount' => 18.94],
        ];

        Wallet::insert($wallets);
    }
}
