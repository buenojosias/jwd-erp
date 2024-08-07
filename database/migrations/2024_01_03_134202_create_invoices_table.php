<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->nullable()->constrained();
            $table->string('category'); // Celular, Internet, Cartão de crédito
            $table->string('company'); // Ligga, Vivo, Will, Nubank
            $table->string('reference'); // Mês de referência
            $table->decimal('amount', 8, 2);
            $table->string('status', 20); // Prévia, Fechada, Paga, Atrasada, Renegociada
            $table->tinyText('note');
            $table->date('due_date')->nullable();
            $table->date('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
