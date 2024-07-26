<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recommended_by')->nullable()->constrained('id')->on('clients');
            $table->string('name');
            $table->string('reference'); // Ex: Igreja, UTFPR
            $table->string('whatsapp', 15);
            $table->string('phone', 15)->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
