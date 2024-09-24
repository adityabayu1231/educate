<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'subject_id',
        'bank',
        'account_number',
        'account_name'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
