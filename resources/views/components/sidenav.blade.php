{{-- Sidebar --}}
    <div class="w-64 bg-white shadow-lg p-6 hidden md:flex flex-col">
        <div class="flex items-center justify-center mb-8">
            <span class="text-2xl font-bold text-gray-600">Students_RMS</span>
        </div>
        <nav class="flex flex-col space-y-6">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-gray-600 hover:text-gray-800">
                <i class="bi bi-grid text-lg"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('students.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-gray-800">
                <i class="bi bi-people-fill"></i>
                <span>Students</span>
            </a>
            <a href="{{ route('courses.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-gray-800">
                <i class="bi bi-book-fill"></i>
                <span>Courses</span>
            </a>
            <a href="{{ route('attendance.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-gray-800">
                <i class="bi bi-person-check-fill"></i>
                <span>Attendance</span>
            </a>
            <a href="{{ route('grades.index') }}" class="flex items-center space-x-3 text-gray-600 hover:text-gray-800">
                <i class="bi bi-pencil"></i>
                <span>Grades</span>
            </a>
            <a href="{{ route('attendance.report') }}" class="flex items-center space-x-3 text-gray-600 hover:text-gray-800">
            <i class="bi bi-flag"></i>
                <span>Reports</span>
            </a>
        </nav>
    </div>