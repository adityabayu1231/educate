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
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_soal_id')->constrained('paket_soal')->onDelete('cascade');
            $table->text('soal');
            $table->string('soal_gambar')->nullable();
            $table->string('pil_a');
            $table->integer('skor_a');
            $table->string('pil_b');
            $table->integer('skor_b');
            $table->string('pil_c')->nullable();
            $table->integer('skor_c')->nullable();
            $table->string('pil_d')->nullable();
            $table->integer('skor_d')->nullable();
            $table->string('pil_e')->nullable();
            $table->integer('skor_e')->nullable();
            $table->string('jawaban');
            $table->text('pembahasan')->nullable();
            $table->string('gambar_pembahasan')->nullable();
            $table->string('bab')->nullable();
            $table->string('video_penjelasan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal');
    }
};
