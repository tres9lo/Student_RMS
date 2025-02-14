<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('AttendanceId'); // Primary key for the attendance table
            $table->unsignedBigInteger('StudentId'); // Make sure this is the same type as 'students.id'
            $table->unsignedBigInteger('CourseId'); // Make sure this is the same type as 'courses.id'
            $table->date('AttendanceDate');
            $table->enum('AttendanceStatus', ['Present', 'Absent', 'Late']);
            $table->timestamps();
        
            // Adding foreign keys
            $table->foreign('StudentId')->references('StudentId')->on('students')->onDelete('cascade');
            $table->foreign('CourseId')->references('CourseId')->on('courses')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
