<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'Gender' => 'required',
            'DateOfBirth' => 'required|date',
            'ContactNumber' => 'required',
            'Email' => 'required|email|unique:students',
            'Address' => 'required',
            'EnrollmentDate' => 'required|date',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'Gender' => 'required',
            'DateOfBirth' => 'required|date',
            'ContactNumber' => 'required',
            'Email' => 'required|email|unique:students,Email,' . $id . ',StudentId',
            'Address' => 'required',
            'EnrollmentDate' => 'required|date',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

