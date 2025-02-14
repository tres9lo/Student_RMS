<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceReportController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

Route::prefix('attendance')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('attendance.index'); // View all attendance records
    Route::get('/create', [AttendanceController::class, 'create'])->name('attendance.create'); // Choose course to create attendance
    Route::post('/show', [AttendanceController::class, 'show'])->name('attendance.show'); // Show students for the selected course
    Route::post('/store', [AttendanceController::class, 'store'])->name('attendance.store'); // Store attendance records
});



Route::get('grades/select-course', [GradeController::class, 'selectCourse'])->name('grades.selectCourse');
Route::get('grades/assign/{courseId}', [GradeController::class, 'assignGrades'])->name('grades.assign');
Route::resource('grades', GradeController::class);

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::get('/attendance/report', [AttendanceReportController::class, 'index'])->name('attendance.report');
Route::post('/attendance/report/generate', [AttendanceReportController::class, 'generateReport'])->name('attendance.report.generate');



Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

