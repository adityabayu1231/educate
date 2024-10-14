<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Program;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admin.master.materi', compact('brands'));
    }
}
