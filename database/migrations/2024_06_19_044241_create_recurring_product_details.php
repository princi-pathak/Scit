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
        Schema::create('recurring_product_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_recurring_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('qty')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 Active, 2 for Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recurring_product_details');
    }
};
