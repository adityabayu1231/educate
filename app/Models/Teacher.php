<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'postal_code',
        'address',
        'university',
        'degree',
        'major',
        'teaching_level',
        'achievements',
        'notes',
        'photo',
        'nik',
        'cv',
        'subject_ids',
        'bank',
        'account_number',
        'account_name'
    ];

    // Method untuk mendapatkan nama-nama mata pelajaran
    public function getSubjectNamesAttribute()
    {
        // Mengubah subject_ids menjadi array
        $subjectIds = json_decode($this->subject_ids);

        // Mengambil nama mata pelajaran berdasarkan subject_ids
        return Subject::whereIn('id', $subjectIds)->pluck('nama_mapel')->toArray();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-many dengan Subject
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
