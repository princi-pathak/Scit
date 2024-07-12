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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('adder_id')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('cost_price')->nullable();
            $table->string('margin')->nullable();
            $table->string('price')->nullable();
            $table->string('tax_rate')->nullable();
            $table->string('qty')->nullable();
            $table->string('description')->nullable();
            $table->string('product_code')->nullable();
            $table->string('show_temp')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('nominal_code')->nullable();
            $table->string('sales_acc_code')->nullable();
            $table->string('purchase_acc_code')->nullable();
            $table->string('expense_acc_code')->nullable();
            $table->string('location')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 for Active, 2 for Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
