<?php

namespace App\Models;

use App\Models\IkutTest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['ikut_test_id', 'correct_answers', 'wrong_answers', 'score'];

    public function ikutTest()
    {
        return $this->belongsTo(IkutTest::class);
    }
}
