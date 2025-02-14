<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'CourseId';

    protected $fillable = [
        'CourseName',
        'CourseDescription',
        'Duration',
    ];

    /**
     * The students that belong to the course.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student', 'CourseId', 'StudentId');
    }
}
