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
        Schema::create('constructor_regions', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->boolean('status')->default(1)->comment('0 for Inactive, 1 for active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constructor_regions');
    }
};
