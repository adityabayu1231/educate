<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Subtest;
use App\Models\IkutTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketSoal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama_paket_soal'];

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
}
