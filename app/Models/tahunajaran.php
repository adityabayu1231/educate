<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tahunajaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tahun_ajaran';

    protected $fillable = ['name'];
}
