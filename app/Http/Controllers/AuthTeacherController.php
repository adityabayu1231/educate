<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $subjects = Subject::all();
        return view('auth.teacher.biodata', compact('subjects'));
    }

    // Method untuk menyimpan data dari form multi-step
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'city_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'religion' => 'required|string',
            'date_of_birth' => 'required|date',
            'achievements' => 'nullable|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'address_details' => 'nullable|string|max:500',
            'address_coordinates' => 'nullable|string|max:255',
            'university' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'subject_ids' => 'required|array',
            'subject_ids.*' => 'integer|exists:subjects,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:12048',
            'ktp' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'teaching_level' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500', // Added notes field
            'bank' => 'required|string|max:255', // Added bank field
            'account_number' => 'required|string|max:20', // Added account_number field
            'account_name' => 'required|string|max:255', // Added account_name field
        ]);

        // Simpan foto, KTP, dan CV jika ada
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('teacher/photos', 'public');
        }

        if ($request->hasFile('ktp')) {
            $validatedData['ktp'] = $request->file('ktp')->store('teacher/ktp', 'public');
        }

        if ($request->hasFile('cv')) {
            $validatedData['cv'] = $request->file('cv')->store('teacher/cv', 'public');
        }
        // Mengubah array ID menjadi JSON
        $validatedData['subject_ids'] = json_encode($validatedData['subject_ids']);
        // Simpan data ke model Teacher
        Teacher::create([
            'user_id' => Auth::id(),
            'place_of_birth' => $validatedData['city_of_birth'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'gender' => $validatedData['gender'],
            'religion' => $validatedData['religion'],
            'province_id' => $validatedData['province'],
            'city_id' => $validatedData['city'],
            'district_id' => $validatedData['district'],
            'village_id' => $validatedData['village'],
            'postal_code' => $validatedData['postal_code'],
            'address' => $validatedData['address_details'],
            'university' => $validatedData['university'],
            'degree' => $validatedData['degree'],
            'major' => $validatedData['major'],
            'teaching_level' => $validatedData['teaching_level'],
            'achievements' => $validatedData['achievements'],
            'notes' => $validatedData['notes'] ?? null, // Added notes field
            'photo' => $validatedData['photo'] ?? null,
            'nik' => $validatedData['ktp'] ?? null, // Updated from NIK to KTP
            'cv' => $validatedData['cv'] ?? null,
            'subject_ids' => $validatedData['subject_ids'], // Updated to match the form input
            'bank' => $validatedData['bank'], // Added bank field
            'account_number' => $validatedData['account_number'], // Added account_number field
            'account_name' => $validatedData['account_name'], // Added account_name field
        ]);

        return redirect()->route('dashboard')->with('success', 'Data successfully saved.');
    }
}
