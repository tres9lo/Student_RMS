<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'StudentId';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Gender',
        'DateOfBirth',
        'ContactNumber',
        'Email',
        'Address',
        'EnrollmentDate',
    ];

    /**
     * The courses that the student is enrolled in.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'StudentId', 'CourseId');
    }
}

