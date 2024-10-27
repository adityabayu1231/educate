<?php

namespace App\Models;

use App\Models\Sesi;
use App\Models\IkutTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestKelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id_sesi', 'nama_test', 'jenis', 'teknis_ujian', 'mulai_test', 'selesai_test', 'jadwal_webinar', 'id_jadwal_learning', 'passing_grade'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_sesi');
    }

    public function ikutTest()
    {
        return $this->hasMany(IkutTest::class);
    }
}
