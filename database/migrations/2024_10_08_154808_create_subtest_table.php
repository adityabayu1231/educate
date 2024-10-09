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
        Schema::create('subtest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_to_id')->constrained('sesi')->onDelete('cascade');
            $table->foreignId('paket_soal_id')->constrained('paket_soal')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtest');
    }
};