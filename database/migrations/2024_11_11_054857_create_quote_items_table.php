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
        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_id')->constrained()->onDelete('cascade');
            $table->string('type')->comment('1-normal, 2-section');
            $table->string('section_type')->comment('title, image, description, product, section_title, section_image, section_description, section_product');
            $table->integer('product_id')->nullable();
            $table->string('section_title')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('account_code')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('cost_price')->nullable();
            $table->integer('price')->nullable();
            $table->integer('markup')->nullable();
            $table->integer('VAT')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('profit')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_items');
    }
};
