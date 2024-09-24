<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    // Menampilkan halaman CRUD
    public function index()
    {
        $programs = Program::all();
        return view('admin.program', compact('programs'));
    }

    // Menyimpan program baru ke database
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name_program' => 'required|string|max:255',
                'is_active' => 'nullable|string',
                'is_leads' => 'nullable|string',
                'is_home' => 'nullable|string',
                'description' => 'nullable|string',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            // Menyimpan gambar jika ada
            $imagePath = null;
            if ($request->hasFile('cover_image')) {
                $imagePath = $request->file('cover_image')->store('program_images', 'public');
            }

            // Menyimpan data program ke database
            Program::create([
                'name_program' => $request->input('name_program'),
                'is_active' => $request->input('is_active', false),
                'is_leads' => $request->input('is_leads', false),
                'is_home' => $request->input('is_home', false),
                'description' => $request->input('description'),
                'cover_image' => $imagePath,
            ]);

            // Redirect jika berhasil
            return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani error validasi
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Tangani error query database
            return redirect()->back()->withErrors(['error' => 'Database error: ' . $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            // Tangani error umum
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }

    // Memperbarui program di database
    public function update(Request $request, Program $program)
    {
        try {
            // Validasi input
            $request->validate([
                'name_program' => 'required|string|max:255',
                'is_active' => 'nullable|string',  // String untuk mencatat status
                'is_leads' => 'nullable|string',
                'is_home' => 'nullable|string',
                'description' => 'nullable|string',
                'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Menyimpan gambar jika ada
            if ($request->hasFile('cover_image')) {
                // Hapus gambar lama jika ada
                if ($program->cover_image) {
                    Storage::disk('public')->delete($program->cover_image);
                }

                $imagePath = $request->file('cover_image')->store('program_images', 'public');
            } else {
                $imagePath = $program->cover_image;
            }

            // Memperbarui data program di database
            $program->update([
                'name_program' => $request->input('name_program'),
                'is_active' => $request->input('is_active', $program->is_active),  // Tetap menggunakan string
                'is_leads' => $request->input('is_leads', false),
                'is_home' => $request->input('is_home', false),
                'description' => $request->input('description'),
                'cover_image' => $imagePath,
            ]);

            return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update program: ' . $e->getMessage()]);
        }
    }


    // Menghapus program dari database
    public function destroy(Program $program)
    {
        // Hapus gambar jika ada
        if ($program->cover_image) {
            Storage::disk('public')->delete($program->cover_image);
        }

        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully.');
    }
}
