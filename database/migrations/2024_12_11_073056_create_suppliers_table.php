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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('contact_name');
            $table->string('email')->nullable();
            $table->integer('telephone_code_id')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('mobile_code_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->text('address');
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country_id')->nullable();
            $table->string('currency_id')->nullable();
            $table->decimal('creadit_limit', 8, 2)->nullable();
            $table->string('vat_tax_no')->nullable();
            $table->string('account_ref')->nullable();
            $table->string('purchase_terms')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('status')->comment('1 Active, 0 Inactive');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
