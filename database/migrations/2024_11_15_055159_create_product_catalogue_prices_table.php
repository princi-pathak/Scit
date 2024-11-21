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
        Schema::create('product_catalogue_prices', function (Blueprint $table) {
            $table->id();
            $table->string('product_catalogue_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('default_price')->nullable();
            $table->string('catalogue_price')->nullable();
            $table->string('product_type')->comment("1=products 2=service 3=consumable 4=product group");
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_catalogue_prices');
    }
};
