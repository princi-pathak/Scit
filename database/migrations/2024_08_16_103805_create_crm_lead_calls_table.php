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
        Schema::create('crm_lead_calls', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->string('lead_id');
            $table->boolean('direction')->comment('0-out, 1-in')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('crm_type_id');
            $table->text('notes');
            $table->boolean('notify')->comment('1-yes 0-no')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('notification')->comment('1-yes 0-no')->nullable();
            $table->boolean('sms')->comment('1-yes 0-no')->nullable();
            $table->boolean('email')->comment('1-yes 0-no')->nullable();
            $table->boolean('customer_visibility')->comment('1-yes 0-no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_lead_calls');
    }
};
