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
        Schema::create('lead_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('lead_ref');
            $table->integer('user_id');
            $table->integer('lead_task_type_id');
            $table->string('title');
            $table->date('create_date')->nullable();
            $table->time('create_time')->nullable();
            $table->boolean('notification')->comment('0-no, 1-yes')->default(0);
            $table->boolean('email_notify')->comment('0-no, 1-yes')->default(0);
            $table->boolean('sms_notify')->comment('0-no, 1-yes')->default(0);
            $table->date('notify_date')->nullable();
            $table->time('notify_time')->nullable();
            $table->text('notes')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_tasks');
    }
};
