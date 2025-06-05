<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integerIncrements('StudentID');
            $table->string('StudentName');
            $table->string('StudentEmail');
            $table->enum('StudentGender', ['0','1','3']);
            $table->unsignedInteger('FK_ClassroomID');
            $table->foreign('FK_ClassroomID')->references('ClassroomID')->on('Classrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
