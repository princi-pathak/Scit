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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_ref')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('project_value')->nullable();
            $table->string('description')->nullable();
            $table->string('catalogue_id')->nullable();
            $table->boolean('status')->default(1)->comment("0 for In-active, 1 for Active, 2 for Delete");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
