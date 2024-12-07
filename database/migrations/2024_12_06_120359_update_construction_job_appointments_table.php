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
        Schema::table('construction_job_appointments', function (Blueprint $table) {
            $table->string('email')->after('notes')->nullable();
            $table->string('travel_time')->after('notes')->nullable();
            $table->string('floating_appointment')->after('notes')->nullable();

            $table->renameColumn('alert_by', 'sms');
            $table->renameColumn('appointment_checkbox', 'single_appointment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('construction_job_appointments', function (Blueprint $table) {
            $table->dropColumn(['new_column_1', 'new_column_2']);

            $table->renameColumn('sms', 'alert_by');
        });
    }
};
