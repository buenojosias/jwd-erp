<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('traffic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identifier_id')->constrained(); // Passeio, Igreja, Aplicativo, Cliente, Mercado
            $table->date('date');
            $table->time('time');
            $table->string('destination')->nullable();
            $table->decimal('initial_km', 8, 3);
            $table->decimal('final_km', 8, 3)->nullable();
            $table->decimal('distance', 8, 3)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('traffic');
    }
};
