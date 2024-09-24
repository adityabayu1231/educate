<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
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
    public function store(StoreStudentRequest $request)
    {
        //
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
