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
        Schema::create('work_flows', function (Blueprint $table) {
            $table->id();
            $table->string('home_id')->nullable();
            $table->string('job_type_id')->nullable();
            $table->string('flow_name')->nullable();
            $table->string('appointment_id')->nullable();
            $table->boolean('status')->default(1)->comment("0 for In-active, 1 for Active, 2 for delete");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_flows');
    }
};
