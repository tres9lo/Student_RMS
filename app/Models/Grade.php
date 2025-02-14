<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $primaryKey = 'GradeId';
    protected $fillable = ['StudentId', 'CourseId', 'ExamDate', 'Grade'];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentId');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseId');
    }
}

