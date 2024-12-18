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
        Schema::create('quote_deposit', function (Blueprint $table) {
            $table->id();
            $table->integer('quote_id');
            $table->integer('deposit_percantage');
            $table->decimal('amount', 8,2)->comment('Amount included tax');
            $table->string('reference');
            $table->text('description');
            $table->integer('payment_type');
            $table->date('deposit_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_deposit');
    }
};
