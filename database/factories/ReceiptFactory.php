<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client_id = rand(1, 12);
        $date = fake()->dateTimeBetween('-30 days', 'now');
        $balance_before = rand(50, 1000);
        $amount = rand(100, 300);

        $transaction = Transaction::create([
            'wallet_id' => rand(1, 3),
            'identifier' => 'Cliente',
            'description' => 'Recebimento do cliente ' .$client_id,
            'date' => $date,
            'amount' => $amount,
            'balance_before' => $balance_before,
            'balance_after' => $balance_before + $amount,
        ]);

        return [
            'client_id' => $client_id,
            'transaction_id' => $transaction->id,
            'date' => $date,
            'amount' => $amount,
            'note' => fake()->randomElement([null, fake()->sentence])
        ];
    }
}
