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
        Schema::create('construction_job_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('job_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('appointment_type_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_time')->nullable();
            $table->text('notes')->nullable();
            $table->string('alert_by')->nullable();
            $table->string('priority')->nullable();
            $table->string('appointment_checkbox')->nullable();
            $table->string('appointment_time')->nullable();
            $table->boolean('appointment_status')->nullable()->comment("This status for show the stage of appointment like Received,Awaiting,Accepted etc");
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_job_appointments');
    }
};
