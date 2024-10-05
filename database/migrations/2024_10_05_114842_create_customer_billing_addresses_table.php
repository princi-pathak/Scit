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
            $table->string('city');
            $table->string('county');
            $table->string('postcode');
            $table->string('telephone');
            $table->string('mobile');
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
