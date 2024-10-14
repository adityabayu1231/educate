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
        Schema::create('test_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sesi')->constrained('kelas')->onDelete('cascade');
            $table->string('nama_test');
            $table->string('jenis');
            $table->string('teknis_ujian');
            $table->timestamp('mulai_test');
            $table->timestamp('selesai_test');
            $table->timestamp('jadwal_webinar')->nullable();
            $table->string('id_jadwal_learning');
            $table->integer('passing_grade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_kelas');
    }
};
