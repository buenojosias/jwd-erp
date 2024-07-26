<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kb_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kb_student_id')->constrained();
            $table->string('reference', 6);
            $table->decimal('amount', 8, 2)->nullable();
            $table->date('due_date');
            $table->date('payment_date')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kb_payments');
    }
};
