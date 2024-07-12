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
        Schema::create('construction_account_codes', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('name')->nullable();
            $table->string('departmental_code')->nullable();
            $table->boolean('status')->default(1)->comment('0 for In-active, 1 for Active, 2 for delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_account_codes');
    }
};
