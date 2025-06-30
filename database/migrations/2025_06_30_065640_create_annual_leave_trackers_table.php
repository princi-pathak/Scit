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
        Schema::create('annual_leave_trackers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('department');
            $table->integer('month');
            $table->date('start_date');
            $table->string('entitlement');
            $table->string('leave_hours_used');
            $table->string('leave_hours_left');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_leave_trackers');
    }
};
