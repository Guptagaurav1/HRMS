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
        Schema::table('leave_regularizations', function (Blueprint $table) {
            $table->text('half_day_leave_dates')->nullable()->after('leave_dates')->comment('Half day leave dates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leave_regularizations', function (Blueprint $table) {
            $table->dropIfExists('half_day_leave_dates');
        });
    }
};
