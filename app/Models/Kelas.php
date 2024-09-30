<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Level;
use App\Models\Program;
use App\Models\Student;
use App\Models\SubProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_class',
        'tahun_ajar',
        'kapasitas',
        'status',
        'jenis_pembelajaran',
        'program_id',
        'subprogram_id',
        'brand_id',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Relasi ke SubProgram.
     */
    public function subprogram()
    {
        return $this->belongsTo(SubProgram::class);
    }

    /**
     * Relasi ke Brand.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
