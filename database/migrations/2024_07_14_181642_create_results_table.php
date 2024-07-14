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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('grade')->nullable(true);
            $table->double('obtain_marks')->nullable(true);
            $table->double('total_marks')->nullable(true);
            $table->double('cgpa')->nullable(true);
            $table->string('status')->default('pending')->nullable(true);
            $table->string('class')->default('pending')->nullable(true);
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
