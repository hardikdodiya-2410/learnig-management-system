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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('set null');
            $table->string('course_name');
            $table->integer('marks'); 
            $table->integer('total_marks'); 
            $table->decimal('percentage', 5, 2); 
            $table->string('grade', 10);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_results');
    }
};