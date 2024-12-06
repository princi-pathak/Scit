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
        Schema::table('construction_jobassign_products', function (Blueprint $table) {
            $table->string('code')->after('qty')->nullable();
            $table->string('description')->after('qty')->nullable();
            $table->string('cost_price')->after('qty')->nullable();
            $table->string('price')->after('qty')->nullable();
            $table->string('discount')->after('qty')->nullable();
            $table->string('vat')->after('qty')->nullable();
            $table->string('product_name')->after('qty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('construction_jobassign_products', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('description');
            $table->dropColumn('cost_price');
            $table->dropColumn('price');
            $table->dropColumn('discount');
            $table->dropColumn('vat');
            $table->dropColumn('product_name');
        });
    }
};
