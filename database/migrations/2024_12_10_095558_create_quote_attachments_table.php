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
        Schema::create('quote_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id'); 
            $table->integer('attachment_type')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('original_name');
            $table->string('timestamp_name');
            $table->string('mime_type');
            $table->string('size');
            $table->boolean('mobile_user_visible')->default(0);
            $table->boolean('customer_visible')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_attachments');
    }
};
