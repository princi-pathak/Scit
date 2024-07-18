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
        Schema::create('construction_jobassign_products', function (Blueprint $table) {
            $table->id();
            $table->string('job_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('qty')->nullable();
            $table->boolean('status')->default(1)->comment("1 for Active, 0 for In-active, 2 for delete");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_jobassign_products');
    }
};
