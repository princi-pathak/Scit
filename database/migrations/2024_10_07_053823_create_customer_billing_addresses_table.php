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
        Schema::create('customer_billing_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->boolean('default_billing');
            $table->string('contact_name');
            $table->integer('job_title_id');
            $table->string('email');
            $table->string('telephone');
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->boolean('same_as_default');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('pincode')->nullable();
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_billing_addresses');
    }
};
