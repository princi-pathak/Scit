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
        Schema::table('constructor_additional_contacts', function (Blueprint $table) {
            $table->string('home_id')->after('id');
            $table->string('userType')->after('country_id')->nullable()->comment("1 Customer,2 Supplier, 3 User");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('constructor_additional_contacts', function (Blueprint $table) {
            $table->dropColumn('home_id');
            $table->dropColumn('userType');
        });
    }
};
