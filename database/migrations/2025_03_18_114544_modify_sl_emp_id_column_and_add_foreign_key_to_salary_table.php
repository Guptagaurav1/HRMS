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
        Schema::table('salary', function (Blueprint $table) {
            $table->unsignedBigInteger('sl_emp_id')->change();

            $table->foreign('sl_emp_id')
                  ->references('id')
                  ->on('emp_details')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salary', function (Blueprint $table) {
            $table->dropForeign(['sl_emp_id']);
            //
        });
    }
};
