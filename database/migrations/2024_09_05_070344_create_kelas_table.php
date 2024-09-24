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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('code_class');
            $table->string('name_class');
            $table->string('tahun_ajar');
            $table->integer('kapasitas');
            $table->integer('status');
            $table->string('jenis_pembelajaran');
            $table->foreignId('program_id')->constrained('programs');
            $table->foreignId('subprogram_id')->constrained('sub_programs');
            $table->foreignId('brand_id')->constrained('brands');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
