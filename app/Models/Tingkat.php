<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'nama_kelas', 'kode_tingkat'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
