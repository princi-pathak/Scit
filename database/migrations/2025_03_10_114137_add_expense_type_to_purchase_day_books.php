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
        Schema::table('purchase_day_books', function (Blueprint $table) {
            $table->decimal('reclaim', 8, 2)->nullable();
            $table->decimal('not_reclaim', 8, 2)->nullable();
            $table->integer('expense_type')->nullable();
            $table->decimal('expense_amount', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_day_books', function (Blueprint $table) {
            //
        });
    }
};
