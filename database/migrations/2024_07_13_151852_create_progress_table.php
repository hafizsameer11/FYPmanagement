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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->string('week_start_date')->nullable(true);
            $table->string('week_end_date')->nullable(true);
            $table->string('research')->nullable(true);
            $table->string('coding')->nullable(true);
            $table->text('comments')->nullable(true);
            $table->text('challenges')->nullable(true);
            $table->text('supervisorsignature')->nullable(true);
            $table->text('date')->nullable(true);
            $table->string('documentation')->nullable(true);
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
