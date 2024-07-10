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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); 
            $table->string('customer_type_id'); 
            $table->string('contact_name'); 
            $table->string('job_title'); 
            $table->string('email')->unique(); 
            $table->string('telephone')->nullable(); 
            $table->string('mobile')->nullable(); 
            $table->string('fax')->nullable(); 
            $table->string('catalogue_id')->nullable(); 
            $table->string('region')->nullable(); 
            $table->string('address');
            $table->string('city')->nullable(); 
            $table->string('country')->nullable(); 
            $table->string('postal_code')->nullable(); 
            $table->string('country_code')->nullable(); 
            $table->string('notes')->nullable(); 
            $table->string('currency')->nullable(); 
            $table->string('credit_limit')->nullable(); 
            $table->string('discount')->nullable(); 
            $table->string('discount_type')->nullable()->comment('Percantage or Flat'); 
            $table->string('saga_ref')->nullable(); 
            $table->string('company_reg')->nullable(); 
            $table->string('vat_tax_no')->nullable(); 
            $table->integer('payment_terms')->default(21); 
            $table->boolean('assigned_product')->nullable(); 
            // $table->string('notes')->nullable(); 
            $table->string('product_tax')->nullable()->comment('VAT 20 or VAT 5'); 
            $table->string('service_tax')->nullable()->comment('VAT 20 or VAT 5'); 
            $table->boolean('status')->default(1); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
