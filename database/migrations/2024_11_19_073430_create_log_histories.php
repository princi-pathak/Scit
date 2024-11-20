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
        Schema::create('log_histories', function (Blueprint $table) {
            $table->id();
            $table->string('home_id');
            $table->string('taskId')->comment('this is tell about what action performed by user');
            $table->string('userId');
            $table->string('userType')->comment('1 Customer,2 Supplier,3 User');
            $table->string('type');
            $table->json('notes')->nullable();
            $table->string('status')->nullable();
            $table->text('modelName');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_histories');
    }
};
