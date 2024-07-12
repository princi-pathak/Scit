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
        Schema::create('construction_product_supplier_lists', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('part_number')->nullable();
            $table->string('cost_price_supplier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_product_supplier_lists');
    }
};
