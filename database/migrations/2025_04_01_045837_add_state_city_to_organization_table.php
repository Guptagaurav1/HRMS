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
        Schema::table('organizations', function (Blueprint $table) {
            $table->unsignedBigInteger('state_id')->nullable()->after('name');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('NO ACTION');
            $table->unsignedBigInteger('city_id')->nullable()->after('state_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('NO ACTION');
            $table->bigInteger('postal_code')->nullable()->after('city_id');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('state_id');
            $table->dropColumn('city_id');
            $table->dropColumn('postal_code');
        });
    }
};
