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
        Schema::create('crm_lead_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->integer('lead_id');
            $table->string('crm_section_type_id');
            $table->text('notes');
            $table->boolean('notify');
            $table->integer('user_id')->nullable();
            $table->boolean('notification')->nullable();
            $table->boolean('sms')->nullable();
            $table->boolean('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_lead_complaints');
    }
};
