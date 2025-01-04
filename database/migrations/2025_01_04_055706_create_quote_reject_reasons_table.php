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
        Schema::create('quote_reject_reasons', function (Blueprint $table) {
            $table->id();
            $table->integer('quote_id');
            $table->integer('reject_type_id');
            $table->text('reject_reasons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_reject_reasons');
    }
};
