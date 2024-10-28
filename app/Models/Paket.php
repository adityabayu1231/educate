<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Subject;
use App\Models\Subtest;
use App\Models\IkutTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_paket_soal',
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

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function ikutTest()
    {
        return $this->hasMany(IkutTest::class);
    }

    public function subtest()
    {
        return $this->hasMany(Subtest::class);
    }

    public function ikutTests()
    {
        return $this->hasMany(IkutTest::class, 'paket_soal_id', 'id');
    }
}
