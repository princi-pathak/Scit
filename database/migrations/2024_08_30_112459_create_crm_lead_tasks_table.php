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
        Schema::create('crm_lead_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->integer('lead_id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('task_type_id');
            $table->date('start_date')->nullable();
            $table->time('start_time');
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->boolean('is_recurring')->comment('0-no 1-yes')->nullable();
            $table->boolean('notify')->nullable();
            $table->boolean('notification')->nullable();
            $table->boolean('email')->nullable();
            $table->boolean('sms')->nullable();
            $table->date('task_date')->nullable();
            $table->time('task_time')->nullable();
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_lead_tasks');
    }
};
