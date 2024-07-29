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
        Schema::create('construction_customer_logins', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password_type')->nullable();
            $table->string('name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('access_rights')->nullable();
            $table->string('projects')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_customer_logins');
    }
};
