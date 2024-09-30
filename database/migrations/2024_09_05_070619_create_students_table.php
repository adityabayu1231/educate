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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('eduline_id')->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('program_id')->constrained('programs');
            $table->foreignId('sub_program_id')->constrained('sub_programs');
            $table->foreignId('class_id')->nullable()->constrained('kelas');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('religion');
            $table->string('previous_school')->nullable();
            $table->string('major')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('photo')->nullable();
            $table->integer('number_of_sessions')->nullable();
            $table->text('address')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('institution')->nullable();
            $table->string('formation')->nullable();
            $table->text('instagram_data')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_email')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_email')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
