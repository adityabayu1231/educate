<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\SubProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'programs';
    protected $fillable = ['name_program', 'is_active', 'description', 'cover_image'];

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
