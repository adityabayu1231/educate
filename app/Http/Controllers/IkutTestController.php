<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\IkutTest;
use App\Models\Program;
use Illuminate\Http\Request;

class IkutTestController extends Controller
{
    public function index()
    {
        $ikuttests = IkutTest::all();
        return view('admin.educenter.assignikutujian.index', compact('ikuttests'));
    }

    public function create()
    {
        $brands = Brand::all();
        $programs = Program::all();
        return view('admin.educenter.assignikutujian.create', compact('brands', 'programs'));
    }
}
