@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Edit Course</h1>
            </div>

            <form action="{{ route('courses.update', $course->CourseId) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="CourseName" class="block text-sm font-medium text-gray-700">Course Name</label>
                    <input type="text" name="CourseName" id="CourseName" value="{{ $course->CourseName }}"
                        placeholder="Enter course name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="CourseDescription" class="block text-sm font-medium text-gray-700">Course Description</label>
                    <textarea name="CourseDescription" id="CourseDescription"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        rows="3">{{ $course->CourseDescription }}</textarea>
                </div>

                <div>
                    <label for="Duration" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="text" name="Duration" id="Duration" value="{{ $course->Duration }}"
                        placeholder="Enter duration (e.g., 1 week, 3 months)"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 active:scale-100 focus:outline-none focus:ring focus:ring-blue-300">
                        <i class="bi bi-check-circle mr-2"></i> Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection