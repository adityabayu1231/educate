<?php

namespace App\Models;

use App\Models\User;
use App\Models\Brand;
use App\Models\Kelas;
use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'eduline_id',
        'user_id',
        'brand_id',
        'program_id',
        'sub_program_id',
        'class_id',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'religion',
        'previous_school',
        'major',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'postal_code',
        'photo',
        'number_of_sessions',
        'address',
        'qrcode',
        'institution',
        'formation',
        'instagram_data',
        'father_name',
        'father_email',
        'father_phone',
        'father_occupation',
        'mother_name',
        'mother_email',
        'mother_phone',
        'mother_occupation'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function subProgram(): BelongsTo
    {
        return $this->belongsTo(SubProgram::class);
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
}
