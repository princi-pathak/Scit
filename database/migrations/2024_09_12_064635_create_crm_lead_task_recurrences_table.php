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
        Schema::create('crm_lead_task_recurrences', function (Blueprint $table) {
            $table->id();
            $table->integer('crm_lead_task_id');
            $table->integer('task_end_repe_date')->comment('1-end_after, 2-end_by, 3-no_end_date');
            $table->string('no_of_repetitations')->nullable();
            $table->date('task_end_date')->nullable();
            $table->integer('task_frequency')->comment('1-daily, 2-weekly, 3-monthly');
            $table->string('daily_days')->nullable();
            $table->string('daily_weekday')->nullable();
            $table->string('weekly_days')->nullable();
            $table->string('weekly_weekday')->nullable();
            $table->string('weekly_weeks')->nullable();
            $table->string('monthly_days')->nullable();
            $table->string('monthly_month')->nullable();
            $table->string('every_month_day')->nullable();
            $table->string('every_monthly_month')->nullable();
            $table->string('every_month_of_month')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_lead_task_recurrences');
    }
};
