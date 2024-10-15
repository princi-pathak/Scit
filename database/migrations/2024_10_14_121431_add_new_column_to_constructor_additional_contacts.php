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
            $table->string('telephone_country_code')->nullable()->after('email'); 
            $table->string('mobile_country_code')->nullable()->after('telephone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('constructor_additional_contacts', function (Blueprint $table) {
            $table->dropColumn('telephone_country_code');
            $table->dropColumn('mobile_country_code');
        });
    }
};
