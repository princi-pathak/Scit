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
        Schema::create('quote_call_backs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->date('call_back_date');
            $table->time('call_back_time');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->boolean('notify')->nullable()->default(0);
            $table->date('notify_date');
            $table->time('notify_time');
            $table->string('nottify_who')->nullable();
            $table->boolean('notification')->nullable();
            $table->boolean('email')->nullable();
            $table->boolean('sms')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_call_backs');
    }
};
