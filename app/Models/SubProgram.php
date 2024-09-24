<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Kelas;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProgram extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['program_id', 'name_sub_program', 'brand_id'];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
