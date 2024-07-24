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
        Schema::create('recurrence_pattern_rules', function (Blueprint $table) {
            $table->id();
            $table->string('job_recurring_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('job_create')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_radio')->nullable();
            $table->string('repetition')->nullable();
            $table->string('job_frequency')->nullable();
            $table->string('range_day_first')->nullable();
            $table->string('range_every_first')->nullable();
            $table->string('range_every_sec')->nullable();
            $table->string('range_day_sec')->nullable();
            $table->string('range_every_third')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 Active, 2 for Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurrence_pattern_rules');
    }
};
