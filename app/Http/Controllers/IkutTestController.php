<?php

namespace App\Http\Controllers;

use App\Models\IkutTest;
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
        return view('admin.educenter.assignikutujian.create');
    }
}
