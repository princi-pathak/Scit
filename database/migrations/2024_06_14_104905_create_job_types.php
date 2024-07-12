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
        Schema::create('job_types', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('name')->nullable();
            $table->string('default_days')->nullable();
            $table->string('customer_visible')->nullable();
            $table->string('appointment_id')->nullable();
            $table->boolean('status')->default(1)->comment("0 for in-active, 1 for active, 2 for delete");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_types');
    }
};
