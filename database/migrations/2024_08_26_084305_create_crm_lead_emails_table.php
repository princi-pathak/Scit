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
        Schema::create('crm_lead_emails', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->integer('lead_id');
            $table->string('to');
            $table->string('cc')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('attachment')->nullable();
            $table->boolean('notify');
            $table->integer('notify_user')->nullable();
            $table->boolean('notification')->nullable();
            $table->boolean('sms')->nullable();
            $table->boolean('email')->nullable();
            $table->boolean('customer_visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_lead_emails');
    }
};
