<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kb_queues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('kin')->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->date('request_date');
            $table->json('avaliable_weekdays')->nullable();
            $table->json('avaliable_periods')->nullable();
            $table->string('status');
            $table->string('origin')->nullable(); // Como ficou sabendo ou de onde é
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kb_queues');
    }
};
