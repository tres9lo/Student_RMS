@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex">
<x-sidenav />

    {{-- Main Content --}}
    <div class="flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Course Management</h1>
                    </div>
                    <div>
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg font-medium hover:bg-gray-600 transition duration-300 mr-4">
                            <i class="bi bi-arrow-left mr-2"></i> Back to Dashboard
                        </a>
                        <a href="{{ route('courses.create') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600 transition duration-300">
                            <i class="bi bi-plus-circle mr-2"></i> Register Course
                        </a>
                    </div>
                </div>

                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-6" role="alert">
                    <i class="bi bi-check-circle mr-2"></i> {{ session('success') }}
                </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Course Name</th>
                                <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Duration</th>
                                <th class="px-6 py-3 text-center text-gray-500 font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $course->CourseName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $course->Duration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="{{ route('courses.edit', $course->CourseId) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('courses.destroy', $course->CourseId) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this course?')">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
