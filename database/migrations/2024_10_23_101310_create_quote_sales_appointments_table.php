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
        Schema::create('quote_sales_appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->text('notes');
            $table->integer('appointment_type');
            $table->integer('status');
            $table->boolean('alert_by_sms')->nullable();
            $table->boolean('alert_by_email')->nullable();
            $table->boolean('floating_appointment')->nullable();
            $table->boolean('priority')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.  
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_sales_appointments');
    }
};
