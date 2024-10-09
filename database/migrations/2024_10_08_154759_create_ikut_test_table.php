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
        Schema::create('ikut_test', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Tabel students yang sudah ada
            $table->foreignId('test_kelas_id')->constrained('test_kelas')->onDelete('cascade');
            $table->foreignId('paket_soal_id')->constrained('paket_soal')->onDelete('cascade');
            $table->integer('sisa_waktu');
            $table->boolean('is_selesai')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikut_test');
    }
};
