<?php

namespace App\Http\Controllers;

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
        return view('auth.teacher.biodata');
    }

    // Method untuk menyimpan data dari form multi-step
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'city_of_birth' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'religion' => 'required|string',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:20',
            'status' => 'nullable|string|max:255',
            'achievements' => 'nullable|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'village' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'address_details' => 'nullable|string|max:500',
            'domicile_address' => 'nullable|string|max:500',
            'address_coordinates' => 'nullable|string|max:255',
            'education_level' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'teaching_level' => 'nullable|string|max:255',
            'teacher_requirements' => 'nullable|string|max:500',
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
            'degree' => $validatedData['education_level'],
            'major' => $validatedData['major'],
            'teaching_level' => $validatedData['teaching_level'],
            'achievements' => $validatedData['achievements'],
            'photo' => $validatedData['photo'] ?? null,
            'nik' => $validatedData['ktp'] ?? null,
            'cv' => $validatedData['cv'] ?? null,
            'subject_id' => $validatedData['subject'],
            'bank' => $request->input('bank'),
            'account_number' => $request->input('account_number'),
            'account_name' => $request->input('account_name'),
        ]);

        return redirect()->route('teacher.index')->with('success', 'Data successfully saved.');
    }
}
