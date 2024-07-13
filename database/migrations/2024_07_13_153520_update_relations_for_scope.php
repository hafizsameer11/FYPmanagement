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
        Schema::table('scope_finalizations', function (Blueprint $table) {
            $table->foreignId('stinfoid')->references('id')->on('student_informations')->onDelete('cascade');
            $table->foreignId('supervisorinfoid')->references('id')->on('super_visor_informations')->onDelete('cascade');
            $table->foreignId('cosupervisorinfoid')->references('id')->on('co_super_visor_informations')->onDelete('cascade');
            $table->foreignId('project_id')->references('id')->on('project_rationals')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

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
