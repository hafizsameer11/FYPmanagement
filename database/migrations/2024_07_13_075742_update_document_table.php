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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('document_type')->nullable(true);
            $table->string('rgistration_date')->nullable(true);
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->nullable(true);
            $table->foreignId('supervisor_id')->constrained('supervisors')->onDelete('cascade')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
