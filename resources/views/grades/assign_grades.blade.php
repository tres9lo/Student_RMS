@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Assign Grades for {{ $course->CourseName }}</h1>

            <form action="{{ route('grades.store') }}" method="POST">
                @csrf
                <input type="hidden" name="CourseId" value="{{ $course->CourseId }}">

                @foreach($students as $student)
                <div class="mb-6">
                    <label for="grade_{{ $student->StudentId }}" class="block font-medium">
                        {{ $student->FirstName }} {{ $student->LastName }}
                    </label>
                    <input type="hidden" name="StudentId[]" value="{{ $student->StudentId }}">
                    <input type="text" name="Grade[]" id="grade_{{ $student->StudentId }}" placeholder="Enter Grade" class="w-full border-gray-300 rounded-lg">
                </div>
                @endforeach

                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg">Assign Grades</button>
            </form>
        </div>
    </div>
</div>
@endsection
