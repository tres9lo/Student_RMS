<?php

// database/migrations/xxxx_xx_xx_create_grades_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id('GradeId');
            $table->unsignedBigInteger('StudentId');
            $table->unsignedBigInteger('CourseId');
            $table->date('ExamDate');
            $table->string('Grade', 2);
            $table->timestamps();

            $table->foreign('StudentId')->references('StudentId')->on('students')->onDelete('cascade');
            $table->foreign('CourseId')->references('CourseId')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
};

