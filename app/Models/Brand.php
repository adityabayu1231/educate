<?php

namespace App\Models;

use App\Models\Student;
use App\Models\SubProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_brand'];

    public function subPrograms(): HasMany
    {
        return $this->hasMany(SubProgram::class);
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
