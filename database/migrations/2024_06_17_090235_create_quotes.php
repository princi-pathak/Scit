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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->integer('home_id')->nullable();
            $table->string('quote_ref')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('billing_add_id')->nullable();
            $table->integer('site_add_id')->nullable();
            $table->integer('site_delivery_add_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('quota_type')->nullable();
            $table->date('quota_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('customer_ref')->nullable();
            $table->string('customer_job_ref')->nullable();
            $table->string('purchase_order_ref')->nullable();
            $table->integer('source')->nullable();
            $table->date('performed_job_date')->nullable();
            $table->string('period')->nullable();
            $table->integer('quote_status');
            $table->string('tags')->nullable();
            $table->text('extra_information')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('tearms')->nullable();
            $table->text('internal_notes')->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('vat_amount', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('deposit', 10, 2)->nullable();
            $table->decimal('outstanding', 10, 2)->nullable();
            $table->string('quotes')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 Active, 2 for Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
