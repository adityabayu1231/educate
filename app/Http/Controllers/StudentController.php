<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search query
        $search = $request->input('search');

        // Retrieve students based on search query and relations
        $students = Student::whereHas('user', function ($query) use ($search) {
            $query->where('fullname', 'like', "%{$search}%");
        })
            ->orWhere('eduline_id', 'like', "%{$search}%")
            ->orWhere('gender', 'like', "%{$search}%")
            ->paginate(10);

        return view('admin.students', compact('students', 'search'));
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
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'program_id' => 'required|exists:programs,id',
            'subprogram' => 'required|string|max:255',
            'birth_city' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'agama' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'provinsi' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'address_detail' => 'required|string',
            'previous_school' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'hobby' => 'nullable|string|max:255',
            'your_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'address_coordinate' => 'nullable|string|max:255',
            'father_name' => 'required|string|max:255',
            'father_job' => 'required|string|max:255',
            'father_email' => 'required|email|max:255',
            'father_phone' => 'required|string|max:20',
            'mother_name' => 'required|string|max:255',
            'mother_job' => 'required|string|max:255',
            'mother_email' => 'required|email|max:255',
            'mother_phone' => 'required|string|max:20',
        ]);

        // Generate eduline_id berdasarkan tanggal dan waktu saat ini
        $edulineId = 'EDU-' . Carbon::now()->format('YmdHis'); // Contoh format: EDU-202409271634

        // Simpan data siswa
        $student = Student::create([
            'user_id' => Auth::user()->id,
            'brand_id' => $validatedData['brand_id'],
            'program_id' => $validatedData['program_id'],
            'sub_program_id' => $validatedData['subprogram'],
            'place_of_birth' => $validatedData['birth_city'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'religion' => $validatedData['agama'],
            'gender' => $validatedData['gender'],
            'province_id' => $validatedData['provinsi'],
            'city_id' => $validatedData['city'],
            'district_id' => $validatedData['kecamatan'],
            'village_id' => $validatedData['kelurahan'],
            'postal_code' => $validatedData['postal_code'],
            'address' => $validatedData['address_detail'],
            'previous_school' => $validatedData['previous_school'],
            'major' => $validatedData['grade'],
            'instagram_data' => $validatedData['instagram'],
            'hobby' => $validatedData['hobby'],
            'father_name' => $validatedData['father_name'],
            'father_job' => $validatedData['father_job'],
            'father_email' => $validatedData['father_email'],
            'father_phone' => $validatedData['father_phone'],
            'mother_name' => $validatedData['mother_name'],
            'mother_job' => $validatedData['mother_job'],
            'mother_email' => $validatedData['mother_email'],
            'mother_phone' => $validatedData['mother_phone'],
            'eduline_id' => $edulineId, // Set nilai eduline_id
        ]);

        // Handle upload photo jika ada
        if ($request->hasFile('your_photo')) {
            $path = $request->file('your_photo')->store('photos_student', 'public');
            $student->photo = $path;
            $student->save();
        }

        // Redirect ke dashboard atau halaman sukses
        return redirect()->route('dashboard')->with('success', 'Data siswa berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // Validated data from the UpdateStudentRequest
        $validated = $request->validated();

        // Update the student data
        $student->update($validated);

        return redirect()->route('admin.students.index')->with('status', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('admin.students.index')->with('status', 'Student deleted successfully!');
    }
}
