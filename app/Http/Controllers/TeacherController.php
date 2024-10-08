<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $teachers = Teacher::paginate(10);
            $users = User::all(); // For creating new teacher
            $subjects = Subject::all(); // For subjects selection
            return view('admin.teachers', compact('teachers', 'users', 'subjects'));
        } catch (Exception $e) {
            Log::error("Error fetching teachers: " . $e->getMessage());
            return redirect()->back()->withErrors('Unable to fetch teachers at the moment.');
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
    public function store(StoreTeacherRequest $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        try {
            $teacher->update($request->all());
            return redirect()->route('admin.teachers.index')->with('status', 'Teacher updated successfully!');
        } catch (Exception $e) {
            Log::error("Error updating teacher: " . $e->getMessage());
            return redirect()->back()->withErrors('Unable to update teacher at the moment.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            return redirect()->route('admin.teachers.index')->with('status', 'Teacher deleted successfully!');
        } catch (Exception $e) {
            Log::error("Error deleting teacher: " . $e->getMessage());
            return redirect()->back()->withErrors('Unable to delete teacher at the moment.');
        }
    }
}
