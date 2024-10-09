<?php

namespace App\Models;

use App\Models\TestKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sesi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama_sesi', 'tanggal_mulai', 'tanggal_selesai'];

    public function testKelas()
    {
        return $this->hasMany(TestKelas::class);
    }
}
