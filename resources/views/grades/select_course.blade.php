@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Select Course to Assign Grades</h1>

            <div class="grid grid-cols-1 gap-4">
                @foreach($courses as $course)
                <div class="p-6 bg-gray-100 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $course->CourseName }}</h2>
                    <p class="text-gray-600">{{ $course->CourseDescription }}</p>
                    <p class="text-gray-600">Duration: {{ $course->Duration }}</p>
                    <a href="{{ route('grades.assign', $course->CourseId) }}" class="mt-4 inline-block px-6 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600">
                        Assign Grades
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
