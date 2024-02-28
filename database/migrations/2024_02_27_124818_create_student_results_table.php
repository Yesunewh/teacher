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
        Schema::create('student_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->string('advisor_name');
            $table->string('advisor_phone')->nullable();
            $table->string('conduct')->nullable();
            $table->string('class_activity')->nullable();
            $table->integer('attendance')->nullable();
            $table->float('total_percent')->nullable();
            $table->float('total_result')->nullable();
            $table->json('subject_result')->nullable();
            $table->json('percent')->nullable();
            $table->json('subject_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};
