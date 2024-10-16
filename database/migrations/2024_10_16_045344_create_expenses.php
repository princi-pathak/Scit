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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->string('job_id')->nullable();
            $table->string('title');
            $table->string('amount');
            $table->string('vat');
            $table->string('vat_amount');
            $table->string('gross_amount');
            $table->string('expense_date');
            $table->string('user_id')->comment("this is Expense By");
            $table->string('reference')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('project_id')->nullable();
            $table->string('job')->nullable();
            $table->string('job_appointment_id')->nullable();
            $table->boolean('authorised')->default(0);
            $table->boolean('billable')->default(1);
            $table->boolean('paid')->default(0);
            $table->boolean('reject')->default(0);
            $table->text('notes')->nullable();
            $table->string('attachments')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
