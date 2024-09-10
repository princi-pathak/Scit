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
        Schema::table('construction_job_appointment_types', function (Blueprint $table) {
            $table->text('document')->after('auth')->nullable();
            $table->boolean('notify')->after('auth')->nullable()->comment('0 for No, 1 for Yes');
            $table->integer('on_complete')->after('auth')->nullable();
            $table->integer('on_change')->after('auth')->nullable();
            $table->integer('notification')->after('auth')->nullable();
            $table->integer('sms')->after('auth')->nullable();
            $table->integer('email')->after('auth')->nullable();
            $table->integer('notify_customer')->after('auth')->nullable();
            $table->text('notify_who')->after('auth')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('construction_job_appointment_types', function (Blueprint $table) {
            $table->dropColumn('document');
            $table->dropColumn('notify');
            $table->dropColumn('on_complete');
            $table->dropColumn('on_change');
            $table->dropColumn('notification');
            $table->dropColumn('sms');
            $table->dropColumn('email');
            $table->dropColumn('notify_customer');
            $table->dropColumn('notify_who');
        });
    }
};
