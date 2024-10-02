<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'mapel_id',
        'durasi',
        'penilaian',
        'urutan',
        'video_pembahasan',
        'video_pembahasan_free',
    ];

    // Relasi dengan model Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'mapel_id');
    }
}
