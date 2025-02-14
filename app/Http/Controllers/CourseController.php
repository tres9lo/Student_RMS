<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CourseName' => 'required',
            'CourseDescription' => 'required',
            'Duration' => 'required',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course registered successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'CourseName' => 'required',
            'CourseDescription' => 'required',
            'Duration' => 'required',
        ]);

        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}

