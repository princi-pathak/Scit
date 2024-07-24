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
        Schema::create('job_recurrings', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('job_type')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('site_id')->nullable();
            $table->string('mobile_sms')->nullable();
            $table->string('sms_alert')->nullable();
            $table->string('customer_ref')->nullable();
            $table->string('amount')->nullable();
            $table->string('purchase_orderref')->nullable();
            $table->string('priority')->nullable();
            $table->string('customer_alert')->nullable();
            $table->string('tags')->nullable();
            $table->string('short_des')->nullable();
            $table->string('instruction')->nullable();
            $table->string('attachments')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 Active, 2 for Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_recurrings');
    }
};
