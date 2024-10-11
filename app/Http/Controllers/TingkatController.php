<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Tingkat;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreTingkatRequest;
use App\Http\Requests\UpdateTingkatRequest;

class TingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Menggunakan paginate untuk membatasi jumlah data per halaman
            $tingkats = Tingkat::with('level')->paginate(10);
            $levels = Level::all();
            return view('admin.master.tingkat', compact('tingkats', 'levels'));
        } catch (\Exception $e) {
            // Logging jika ada error
            Log::error('Error fetching Tingkats: ' . $e->getMessage());
            return redirect()->back()->with('status', 'Failed to fetch Tingkats.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTingkatRequest $request)
    {
        try {
            Tingkat::create($request->validated());
            return redirect()->route('admin.tingkat.index')->with('status', 'Tingkat created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating Tingkat: ' . $e->getMessage());
            return redirect()->back()->with('status', 'Failed to create Tingkat.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tingkat $tingkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tingkat $tingkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTingkatRequest $request, Tingkat $tingkat)
    {
        try {
            $tingkat->update($request->validated());
            return redirect()->route('admin.tingkat.index')->with('status', 'Tingkat updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating Tingkat: ' . $e->getMessage());
            return redirect()->back()->with('status', 'Failed to update Tingkat.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tingkat $tingkat)
    {
        try {
            $tingkat->delete();
            return redirect()->route('admin.tingkat.index')->with('status', 'Tingkat deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting Tingkat: ' . $e->getMessage());
            return redirect()->back()->with('status', 'Failed to delete Tingkat.');
        }
    }
}
