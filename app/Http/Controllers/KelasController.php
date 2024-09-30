<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::paginate(10);
        return view('admin.kelas', compact('kelass'));
    }
}
