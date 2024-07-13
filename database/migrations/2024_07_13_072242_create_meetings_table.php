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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(true);

            $table->string('date')->nullable(true);
            $table->string('time')->nullable(true);
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('supervisor_id')->constrained('supervisors')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
