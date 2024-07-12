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
            $table->string('home_id')->nullable();
            $table->string('quote_ref')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('project_id')->nullable();
            $table->string('quota_type')->nullable();
            $table->string('quota_date')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('customer_ref')->nullable();
            $table->string('customer_job_ref')->nullable();
            $table->string('purchase_order_ref')->nullable();
            $table->string('source')->nullable();
            $table->string('performed_job_date')->nullable();
            $table->string('period')->nullable();
            $table->string('tags')->nullable();
            // $table->string('product_id')->nullable();
            $table->string('title')->nullable();
            $table->string('title_description')->nullable();
            // $table->string('description')->nullable();
            // $table->string('qty')->nullable();
            // $table->string('cost_price')->nullable();
            $table->string('price')->nullable();
            $table->string('vat')->nullable();
            // $table->string('discount')->nullable();
            $table->text('extra_information')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('tearms')->nullable();
            $table->text('internal_notes')->nullable();
            $table->string('attachments')->nullable();
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
