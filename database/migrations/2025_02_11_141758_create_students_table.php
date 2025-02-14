<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('StudentId');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Gender');
            $table->date('DateOfBirth');
            $table->string('ContactNumber');
            $table->string('Email')->unique();
            $table->text('Address');
            $table->date('EnrollmentDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};

