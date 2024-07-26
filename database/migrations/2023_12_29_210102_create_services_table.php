<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('amount', 9, 2)->nullable();
            $table->string('status', 24);
            $table->date('requested_at');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable(); // Prazo de conclusão
            $table->date('finished_at')->nullable(); // Data em que foi concluído
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
