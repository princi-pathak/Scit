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
        Schema::create('quote_reject_types', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('title');
            $table->boolean('status')->default(1)->comment('1-active, 0-inActive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_reject_types');
    }
};
