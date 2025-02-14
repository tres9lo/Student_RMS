<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $primaryKey = 'AttendanceId';

    protected $fillable = [
        'StudentId',
        'CourseId',
        'AttendanceDate',
        'AttendanceStatus',
    ];

    // Define relationships (Assuming the relationships are correct in the Student and Course models)
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentId');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId');
    }
}

