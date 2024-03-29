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
        Schema::create('traffic', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('identifier'); // Passeio, Igreja, Aplicativo, Cliente, Mercado
            $table->string('destination')->nullable();
            $table->decimal('initial_km', 8, 3);
            $table->decimal('final_km', 8, 3)->nullable();
            $table->decimal('distance', 8, 3)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic');
    }
};
