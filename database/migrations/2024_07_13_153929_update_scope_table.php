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
            $table->foreignId('session_id')->references('id')->on('session_informations')->onDelete('cascade');
            $table->string('hodapproval')->default('pending')->nullable(true);
            $table->string('hodapprovaldate')->nullable(true);
            $table->string('supervisorapproval')->default('pending')->nullable(true);
            $table->string('supervisorapprovaldate')->nullable(true);
            $table->string('hopapproval')->default('pending')->nullable(true);
            $table->string('hopapprovaldate')->nullable(true);


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
