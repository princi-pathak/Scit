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
        Schema::create('crm_customer_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->string('customer_id');
            $table->string('contact')->nullable();
            $table->integer('crm_section_type_id');
            $table->text('notes');
            $table->boolean('notify')->comment('1-yes 0-no');
            $table->integer('user_id')->nullable();
            $table->boolean('notification')->nullable()->comment('1-yes 0-no');
            $table->boolean('sms')->comment('1-yes 0-no')->nullable();
            $table->boolean('email')->comment('1-yes 0-no')->nullable();
            $table->boolean('customer_visibility')->comment('1-yes 0-no')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_customer_complaints');
    }
};
