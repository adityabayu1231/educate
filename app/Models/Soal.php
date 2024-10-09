<?php

namespace App\Models;

use App\Models\PaketSoal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['paket_soal_id', 'soal', 'soal_gambar', 'pil_a', 'skor_a', 'pil_b', 'skor_b', 'pil_c', 'skor_c', 'pil_d', 'skor_d', 'pil_e', 'skor_e', 'jawaban', 'pembahasan', 'gambar_pembahasan', 'bab', 'video_penjelasan'];

    public function paketSoal()
    {
        return $this->belongsTo(PaketSoal::class);
    }
}
