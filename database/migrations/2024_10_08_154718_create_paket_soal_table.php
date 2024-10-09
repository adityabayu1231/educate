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
        Schema::create('paket_soal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket_soal');
            $table->foreignId('mapel_id')->constrained('subjects');
            $table->integer('durasi');
            $table->string('penilaian');
            $table->integer('urutan');
            $table->string('video_pembahasan');
            $table->string('video_pembahasan_free');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_soal');
    }
};
