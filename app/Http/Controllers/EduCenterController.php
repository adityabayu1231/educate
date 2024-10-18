<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduCenterController extends Controller
{
    public function index()
    {
        return view('admin.educenter.index');
    }

    public function eModule()
    {
        return view('admin.educenter.emodule');
    }

    public function paketSoal()
    {
        return view('admin.educenter.paketsoal');
    }

    public function assignPaketSoal()
    {
        return view('admin.educenter.assign');
    }

    public function addSoal()
    {
        return view('admin.educenter.addsoal');
    }

    public function addPaket()
    {
        return view('admin.educenter.addpaket');
    }
}
