@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Edit Student</h1>
            </div>

            <form action="{{ route('students.update', $student->StudentId) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="FirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="FirstName" id="FirstName" value="{{ $student->FirstName }}"
                        placeholder="Enter first name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="LastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="LastName" id="LastName" value="{{ $student->LastName }}"
                        placeholder="Enter last name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="Gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="Gender" id="Gender"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Male" {{ $student->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $student->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div>
                    <label for="DateOfBirth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="DateOfBirth" id="DateOfBirth" value="{{ $student->DateOfBirth }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="ContactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" name="ContactNumber" id="ContactNumber" value="{{ $student->ContactNumber }}"
                        placeholder="Enter contact number"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="Email" id="Email" value="{{ $student->Email }}" placeholder="Enter email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="Address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="Address" id="Address" value="{{ $student->Address }}"
                        placeholder="Enter address"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="EnrollmentDate" class="block text-sm font-medium text-gray-700">Enrollment Date</label>
                    <input type="date" name="EnrollmentDate" id="EnrollmentDate" value="{{ $student->EnrollmentDate }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>

                <div class="flex justify-end space-x-4"><a href="{{ url()->previous() }}"  class="px-6 py-3 bg-gray-500 text-white font-medium rounded-lg shadow-lg hover:bg-gray-600 transition duration-300 transform hover:scale-105 active:scale-100 focus:outline-none focus:ring focus:ring-gray-300">
                        <i class="bi bi-arrow-left mr-2"></i> Cancel
                    </a>
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