<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fuel_supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('invoice_item_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->string('company');
            $table->decimal('liters', 6, 3);
            $table->decimal('price', 6, 2); // Preço por litro
            $table->decimal('amount', 6, 2); // Valor total
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fuel_supplies');
    }
};
