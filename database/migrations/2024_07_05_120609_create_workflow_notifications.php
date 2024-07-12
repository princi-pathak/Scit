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
        Schema::create('workflow_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('job_type_id')->nullable();
            $table->string('row_id')->nullable();
            $table->string('notify_when_on_complete')->nullable();
            $table->string('notify_when_on_change')->nullable();
            $table->string('notify_who')->nullable();
            $table->string('notify_customer_on_complete')->nullable();
            $table->string('sendas')->nullable();
            $table->string('sms')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_notifications');
    }
};
