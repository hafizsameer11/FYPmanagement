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
        Schema::create('compaints', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable(true);
            $table->string('status')->nullable(true);
            $table->text('description')->nullable(true);
            $table->text('comments')->nullable(true);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compaints');
    }
};
