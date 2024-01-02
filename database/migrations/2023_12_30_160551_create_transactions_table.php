<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained();
            $table->string('identifier'); // Cliente, Aula, Uber, Venda, Fatura, Mercado
            $table->tinyText('description');
            $table->date('date');
            $table->decimal('amount', 9, 2);
            $table->decimal('balance_before', 9, 2);
            $table->decimal('balance_after', 9, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
