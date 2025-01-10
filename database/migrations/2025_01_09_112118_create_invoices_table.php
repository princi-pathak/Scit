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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('project_id');
            $table->integer('site_delivery_add_id');
            $table->string('invoice_ref');
            $table->integer('invoice_type');
            $table->string('customer_ref')->nullable();
            $table->string('customer_job_ref')->nullable();
            $table->string('purchase_order_ref')->nullable();
            $table->date('invoice_date');
            $table->integer('payment_terms')->default('21');
            $table->date('due_date');
            $table->enum('status', ['Draft', 'Invoiced', 'Outstanding', 'Paid', 'Cancellled'])->default('Draft');
            $table->integer('tags')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('terms')->nullable();
            $table->text('internal_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
