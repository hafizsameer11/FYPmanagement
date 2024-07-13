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
        Schema::create('project_rationals', function (Blueprint $table) {
            $table->id();

            $table->text('prupose')->nullable(true);
            $table->text('motivation')->nullable(true);
            $table->text('relevance')->nullable(true);
            $table->text('personalmotivation')->nullable(true);
            $table->text('aims')->nullable(true);
            $table->text('objectives')->nullable(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_rationals');
    }
};
