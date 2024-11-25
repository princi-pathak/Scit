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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Auto-incrementing UNSIGNED BIGINT primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('currency', 10); // Currency code
            $table->string('payment_gateway', 50); // Payment gateway name
            $table->string('transaction_id')->nullable(); // Gateway transaction ID
            $table->enum('status', ['pending', 'success', 'failed', 'canceled'])->default('pending'); // Payment status
            $table->json('response_data')->nullable(); // Gateway response data
            $table->timestamps(); // created_at and updated_at fields

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
