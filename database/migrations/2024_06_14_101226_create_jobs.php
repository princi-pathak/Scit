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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('job_ref')->nullable();
            $table->string('project_id')->nullable();
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->longText('short_decinc')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode')->nullable();
            $table->string('site_id')->nullable();
            $table->string('region')->nullable();
            $table->string('company')->nullable();
            $table->string('conatact_name')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_telephone')->nullable();
            $table->string('site_mobile')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_city')->nullable();
            $table->string('site_country')->nullable();
            $table->string('site_pincode')->nullable();
            $table->string('notes')->nullable();
            $table->string('customer_ref')->nullable();
            $table->string('cust_job_ref')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('purchase_order_ref')->nullable();
            $table->string('job_type')->nullable();
            $table->string('priorty')->nullable();
            $table->string('alert_customer')->nullable();
            $table->string('on_route_sms')->nullable();
            $table->string('start_date')->nullable();
            $table->string('complete_by')->nullable();
            $table->string('tags')->nullable();
            $table->string('product_id')->nullable();
            $table->longText('customer_notes')->nullable();
            $table->longText('internal_notes')->nullable();
            $table->string('attachments')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
