<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kelas;
use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::paginate(10);
        $brands = Brand::all();
        $programs = Program::all();
        $subprograms = SubProgram::all();
        return view('admin.master.kelas', compact('kelass', 'brands', 'programs', 'subprograms'));
    }

    // Method untuk menyimpan kelas baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name_class' => 'required|string|max:255',
            'tahun_ajar' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'status' => 'required|boolean',
            'jenis_pembelajaran' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'program_id' => 'required|exists:programs,id',
            'subprogram_id' => 'required|exists:sub_programs,id',
        ]);

        // Simpan kelas baru
        Kelas::create([
            'name_class' => $request->name_class,
            'tahun_ajar' => $request->tahun_ajar,
            'kapasitas' => $request->kapasitas,
            'status' => $request->status,
            'jenis_pembelajaran' => $request->jenis_pembelajaran,
            'brand_id' => $request->brand_id,
            'program_id' => $request->program_id,
            'subprogram_id' => $request->subprogram_id,
        ]);

        // Redirect kembali ke halaman kelas dengan pesan sukses
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id); // Find the Kelas by ID

        // Validate the incoming request
        $validatedData = $request->validate([
            'name_class' => 'required|string|max:255',
            'tahun_ajar' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'status' => 'required|boolean',
            'jenis_pembelajaran' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'program_id' => 'required|exists:programs,id',
            'subprogram_id' => 'required|exists:sub_programs,id',
        ]);

        // Update the Kelas with validated data
        $kelas->update($validatedData);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas updated successfully!');
    }

    public function destroy($id)
    {
        // Temukan kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        // Hapus data kelas
        $kelas->delete();

        // Redirect kembali ke halaman kelas dengan pesan sukses
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
