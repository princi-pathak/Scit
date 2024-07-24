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
        Schema::create('construction_tax_rates', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('name')->nullable();
            $table->string('tax_rate')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('exp_date')->nullable();
            $table->string('status')->default(1)->comment('0 for In-active, 1 for Active, 2 for delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_tax_rates');
    }
};
