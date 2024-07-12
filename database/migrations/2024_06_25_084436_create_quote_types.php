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
        Schema::create('quote_types', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('name')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 for Active, 2 for Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_types');
    }
};
