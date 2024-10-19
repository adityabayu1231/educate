<?php

namespace App\Models;

use App\Models\Paket;
use App\Models\PaketSoal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modul';

    protected $fillable = [
        'id_paket_soal',
        'modulpdf',
        'videolinkpembelajaran'
    ];

    // Relasi dengan PaketSoal
    public function paketSoal()
    {
        return $this->belongsTo(Paket::class, 'id_paket_soal');
    }
}
