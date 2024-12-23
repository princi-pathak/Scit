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
        Schema::create('po_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('po_id');
            $table->string('Purchase_ref');
            $table->string('attachment_type')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file');
            $table->string('original_file_name');
            $table->string('mime_type');
            $table->string('size');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_attachments');
    }
};
