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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->integer('user_id');
            $table->integer('supplier_id');
            $table->integer('contact_id')->nullable();
            $table->string('name');
            $table->text('address');
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('postcode')->nullable();
            $table->integer('telephone_code')->nullable();
            $table->integer('telephone')->nullable();
            $table->integer('mobile_code')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('email')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('site_id')->nullable();
            $table->string('user_name');
            $table->string('company_name')->nullable();
            $table->text('user_address');
            $table->string('user_city')->nullable();
            $table->string('user_county')->nullable();
            $table->string('user_post_code')->nullable();
            $table->integer('user_telephone_code')->nullable();
            $table->integer('user_telephone')->nullable();
            $table->integer('user_mobile_code')->nullable();
            $table->integer('user_mobile')->nullable();
            $table->string('expected_deleveryDate')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('reference')->nullable();
            $table->string('qoute_ref')->nullable();
            $table->string('job_ref')->nullable();
            $table->string('invoice_ref')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('payment_due_date')->nullable();
            $table->integer('tag_id')->nullable();
            $table->integer('status');
            $table->text('supplier_notes')->nullable();
            $table->text('delivery_notes')->nullable();
            $table->text('internal_notes')->nullable();
            $table->string('attachment')->nullable();
            $table->string('file_original_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
