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
        Schema::create('quote_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('quote_id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('task_type_id');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->boolean('notify')->nullable();
            $table->date('notify_date')->nullable();
            $table->time('notify_time')->nullable();
            $table->boolean('notification')->nullable();
            $table->boolean('email')->nullable();
            $table->boolean('sms')->nullable();
            $table->boolean('is_recurring')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_tasks');
    }
};
