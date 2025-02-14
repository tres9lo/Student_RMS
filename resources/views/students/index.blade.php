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
                        <h1 class="text-3xl font-bold text-gray-900">Student Management</h1>
                    </div>
                    <div>
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg font-medium hover:bg-gray-600 transition duration-300 mr-4">
                            <i class="bi bi-arrow-left mr-2"></i> Back to Dashboard
                        </a>
                        <a href="{{ route('students.create') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg font-medium hover:bg-green-600 transition duration-300">
                            <i class="bi bi-person-plus mr-2"></i> Register Student
                        </a>
                    </div>
                </div>

                @if(session('success'))
                <div class="bg-gray-100 border border-gray-400 text-gray-700 px-6 py-4 rounded-lg mb-6" role="alert">
                    <i class="bi bi-check-circle mr-2"></i> {{ session('success') }}
                </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">First Name</th>
                                <th class="px-6 py-3 text-left text-gray-500 font-medium uppercase tracking-wider">Last Name</th>
                                <th class="px-6 py-3 text-center text-gray-500 font-medium uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->FirstName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $student->LastName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="{{ route('students.edit', $student->StudentId) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('students.destroy', $student->StudentId) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this student?')">
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
