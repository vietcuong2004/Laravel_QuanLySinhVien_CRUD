<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', ['Students' => Student::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Classrooms = DB::table('Classrooms')->get();
        return view('students.create', compact('Classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'StudentName' => 'required',
            'StudentEmail' => 'required|email',
            'FK_ClassroomID' => 'required|exists:Classrooms,ClassroomID',
        ]);

        $StudentName = $request->input('StudentName');
        $StudentEmail = $request->input('StudentEmail');
        $StudentGender = $request->input('StudentGender');
        $FK_ClassroomID = $request->input('FK_ClassroomID');

        DB::table('Students')->insert([
            'StudentName' => $StudentName,
            'StudentEmail' => $StudentEmail,
            'StudentGender' => $StudentGender,
            'FK_ClassroomID' => $FK_ClassroomID
        ]);

        return redirect()->route('students.index')->with('success', 'Student Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $Student)
    {
        return view('students.show', compact('Student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $Student)
    {
        $Classrooms = Classroom::all();
        return view(
            'students.edit',
            [
                'Classrooms' => $Classrooms,
                'Student' => $Student
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $Student)
    {
        $request->validate([
            'StudentName' => 'required',
            'StudentEmail' => 'required|email',
            'FK_ClassroomID' => 'required|exists:Classrooms,ClassroomID',
        ]);

        $Student->update([
            'StudentName' => $request->input('StudentName'),
            'StudentEmail' => $request->input('StudentEmail'),
            'StudentGender' => $request->input('StudentGender'),
            'FK_ClassroomID' => $request->input('FK_ClassroomID')
        ]);

        return redirect()->route('students.index')->with('success', 'Student Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $Student)
    {
        $Student->delete();
        return redirect()->route('students.index')->with('success', 'Student Data delete successfully.');
    }
}
