@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg border border-gray-200 p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Register Student</h1>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <strong>Whoops! Something went wrong.</strong>
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('students.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="FirstName" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="FirstName" id="FirstName" placeholder="Enter first name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('FirstName') }}" required>
                    @error('FirstName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="LastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="LastName" id="LastName" placeholder="Enter last name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('LastName') }}" required>
                    @error('LastName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="Gender" id="Gender"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="" disabled {{ old('Gender') ? '' : 'selected' }}>Select Gender</option>
                        <option value="Male" {{ old('Gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('Gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('Gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="DateOfBirth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="DateOfBirth" id="DateOfBirth"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('DateOfBirth') }}" required>
                    @error('DateOfBirth')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ContactNumber" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="text" name="ContactNumber" id="ContactNumber" placeholder="Enter contact number"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('ContactNumber') }}" required>
                    @error('ContactNumber')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="Email" id="Email" placeholder="Enter email"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('Email') }}" required>
                    @error('Email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="Address" id="Address" placeholder="Enter address"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('Address') }}" required>
                    @error('Address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="EnrollmentDate" class="block text-sm font-medium text-gray-700">Enrollment Date</label>
                    <input type="date" name="EnrollmentDate" id="EnrollmentDate"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('EnrollmentDate') }}" required>
                    @error('EnrollmentDate')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 active:scale-100 focus:outline-none focus:ring focus:ring-blue-300">
                        <i class="bi bi-person-plus mr-2"></i> Register
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
