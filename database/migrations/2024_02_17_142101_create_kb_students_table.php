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
        Schema::create('kb_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kb_group_id')->nullable()->constrained();
            $table->string('name');
            $table->date('birth');
            $table->string('parent')->nullable();
            $table->string('whatsapp');
            $table->date('registration_date')->nullable();
            $table->string('status')->default('Ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kb_students');
    }
};
