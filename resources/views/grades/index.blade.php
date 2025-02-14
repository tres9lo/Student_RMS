@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-100">
<x-sidenav />

    <!-- Main Content -->
    <div class="flex-1 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Grades List</h1>

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
            @endif

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ url()->previous() }}" 
                   class="px-6 py-2 bg-gray-500 text-white rounded-lg font-medium hover:bg-gray-600">
                   <i class="bi bi-arrow-left mr-2"></i>Back
                </a>
                <a href="{{ route('grades.selectCourse') }}" 
                   class="ml-4 px-6 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-600">
                   <i class="bi bi-person-plus mr-2"></i>Add Grades
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Student</th>
                            <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Grade</th>
                            <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $grade->student->FirstName }} {{ $grade->student->LastName }}</td>
                            <td class="px-6 py-4">{{ $grade->course->CourseName }}</td>
                            <td class="px-6 py-4">{{ $grade->Grade }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('grades.destroy', $grade->GradeId) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this grade?')">Delete</button>
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
@endsection
