<?php

namespace App\Models;

use App\Models\Sesi;
use App\Models\PaketSoal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subtest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sesi_to_id', 'paket_soal_id'];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_to_id');
    }

    public function paketSoal()
    {
        return $this->belongsTo(PaketSoal::class);
    }
}
