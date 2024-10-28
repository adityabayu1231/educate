<?php

namespace App\Models;

use App\Models\Student;
use App\Models\PaketSoal;
use App\Models\TestKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IkutTest extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ikut_test';

    protected $fillable = ['student_id', 'test_kelas_id', 'paket_soal_id', 'sisa_waktu', 'is_selesai'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function testKelas()
    {
        return $this->belongsTo(TestKelas::class);
    }

    public function paketSoal()
    {
        return $this->belongsTo(Paket::class, 'paket_soal_id', 'id'); // Pastikan nama model dan foreign key benar
    }

    public function getPaketSoalNamesAttribute()
    {
        $ids = json_decode($this->paket_soal_id); // Mengubah string JSON menjadi array
        return Paket::whereIn('id', $ids)->pluck('nama_paket_soal')->join(', ');
    }

    public function testResults()
    {
        return $this->hasMany(TestResult::class);
    }
}
