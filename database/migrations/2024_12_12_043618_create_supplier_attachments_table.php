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
        Schema::create('supplier_attachments', function (Blueprint $table) {
            $table->id();
            $table->integer('supplier_id');
            $table->integer('type_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('reminder')->comment('Radio show hide');
            $table->string('reminder_date')->nullable();
            $table->string('reminder_before_days')->nullable();
            $table->string('reminder_email')->nullable();
            $table->string('attachment');
            $table->string('file_original_name');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_attachments');
    }
};
