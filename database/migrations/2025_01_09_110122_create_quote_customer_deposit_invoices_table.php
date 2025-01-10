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
        Schema::create('quote_customer_deposit_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('quote_id');
            $table->integer('customer_id');
            $table->integer('invoice_id');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('line_item');
            $table->text('description');
            $table->integer('desposit_perceantage');    
            $table->decimal('sub_total', 8,2)->comment('Amount included tax');
            $table->integer('discount');
            $table->integer('VAT');
            $table->decimal('total', 8,2)->comment('amount in including VAT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_customer_deposit_invoices');
    }
};
