<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreSubProgramRequest;
use App\Http\Requests\UpdateSubProgramRequest;

class SubProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $subPrograms = SubProgram::all();
            $programs = Program::all();
            $brands = Brand::all();
            return view('admin.master.subprogram', compact('subPrograms', 'programs', 'brands'));
        } catch (\Exception $e) {
            Log::error('Error fetching SubPrograms: ' . $e->getMessage());
            return redirect()->route('admin.subprograms.index')->with('error', 'Failed to fetch SubPrograms.');
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
    public function store(StoreSubProgramRequest $request)
    {
        try {
            SubProgram::create($request->validated());
            return redirect()->route('admin.subprograms.index')->with('status', 'SubProgram created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating SubProgram: ' . $e->getMessage());
            return redirect()->route('admin.subprograms.index')->with('error', 'Failed to create SubProgram.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubProgram $subProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubProgram $subProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubProgramRequest $request, $id)
    {
        try {
            // Mencari SubProgram berdasarkan ID
            $subProgram = SubProgram::find($id);

            // Cek apakah SubProgram ada
            if (!$subProgram) {
                return redirect()->route('admin.subprograms.index')->with('error', 'SubProgram not found.');
            }

            // Mengupdate SubProgram dengan validasi dari request
            $subProgram->update($request->validated());

            return redirect()->route('admin.subprograms.index')->with('status', 'SubProgram updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating SubProgram: ' . $e->getMessage());
            return redirect()->route('admin.subprograms.index')->with('error', 'Failed to update SubProgram.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Mencari SubProgram berdasarkan ID
            $subProgram = SubProgram::find($id);

            // Cek apakah SubProgram ada
            if (!$subProgram) {
                return redirect()->route('admin.subprograms.index')->with('error', 'SubProgram not found.');
            }
            // Menghapus SubProgram
            $subProgram->delete();

            return redirect()->route('admin.subprograms.index')->with('status', 'SubProgram deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting SubProgram: ' . $e->getMessage());
            return redirect()->route('admin.subprograms.index')->with('error', 'Failed to delete SubProgram.');
        }
    }
}
