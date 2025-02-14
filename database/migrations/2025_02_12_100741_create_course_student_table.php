<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();  // Primary key for the pivot table
            $table->unsignedBigInteger('CourseId');
            $table->unsignedBigInteger('StudentId');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('CourseId')->references('CourseId')->on('courses')->onDelete('cascade');
            $table->foreign('StudentId')->references('StudentId')->on('students')->onDelete('cascade');

            // Unique constraint to avoid duplicate entries
            $table->unique(['CourseId', 'StudentId']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}

