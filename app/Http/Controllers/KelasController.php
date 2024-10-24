<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kelas;
use App\Models\Program;
use App\Models\Student;
use App\Models\SubProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::all();
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
            'sub_program_id' => 'required|exists:sub_programs,id',
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
            'sub_program_id' => $request->sub_program_id,
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
            'sub_program_id' => 'required|exists:sub_programs,id',
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

    public function jadwalkelas()
    {
        return view('admin.schedule.index');
    }

    public function kbmkelas()
    {
        return view('admin.schedule.kbmkelas');
    }

    public function kbmprivat()
    {
        return view('admin.schedule.kbmprivat');
    }

    public function coaching()
    {
        return view('admin.schedule.coaching');
    }

    public function laporanbelajar()
    {
        return view('admin.learnreport.index');
    }

    public function getStudentsView($kelasId)
    {
        // Mengambil data kelas beserta relasinya
        $kelas = Kelas::with('program', 'subprogram', 'brand')->find($kelasId);

        // Jika kelas tidak ditemukan
        if (!$kelas) {
            return redirect()->back()->with('status', 'Kelas tidak ditemukan');
        }

        // Mengambil data siswa yang terdaftar di kelas tersebut
        $students = Student::where('class_id', $kelasId)->with('user')->get();

        // Tampilkan view dan kirim data kelas dan siswa
        return view('admin.master.addsiswa.index', compact('kelas', 'students'));
    }

    public function removeClassFromStudent($studentId)
    {
        // Find the student by ID
        $student = Student::find($studentId);

        // Check if student exists
        if (!$student) {
            return redirect()->back()->with('status', 'Student not found');
        }

        // Set the class_id to null to remove the student from the class
        $student->class_id = null;
        $student->save();

        // Redirect back with success message
        return redirect()->back()->with('status', 'Student removed from the class successfully');
    }

    public function getStudents(Kelas $kelas)
    {
        // Ambil siswa yang memiliki program_id, subprogram_id, dan brand_id yang sama dengan kelas
        $students = Student::where('program_id', $kelas->program_id)
            ->where('sub_program_id', $kelas->sub_program_id) // Menggunakan sub_program_id, bukan subprogram_id
            ->where('brand_id', $kelas->brand_id)
            ->whereNull('class_id') // Pastikan siswa belum memiliki class_id
            ->with('user') // Menyertakan relasi user jika diperlukan
            ->get();

        return response()->json($students);
    }

    public function addStudents(Request $request, Kelas $kelas)
    {
        // Mengambil ID siswa yang dikirim melalui AJAX
        $studentId = $request->input('students');

        // Cari siswa berdasarkan ID
        $student = Student::findOrFail($studentId);

        // Update class_id siswa sesuai dengan kelas yang dipilih
        $student->class_id = $kelas->id;
        $student->save();

        // Mengembalikan respon sukses
        return response()->json(['status' => 'success', 'message' => 'Student added to the class successfully.']);
    }
}
