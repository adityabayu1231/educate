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
        Schema::create('sub_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('programs');
            $table->string('name_sub_program');
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
        Schema::dropIfExists('sub_programs');
    }
};
