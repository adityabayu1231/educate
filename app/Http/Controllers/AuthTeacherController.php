<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthTeacherController extends Controller
{
    public function index()
    {
        return view('auth.teacher.index');
    }

    public function passupt()
    {
        return view('auth.teacher.passupt');
    }

    public function biodata()
    {
        return view('auth.teacher.biodata');
    }
}
