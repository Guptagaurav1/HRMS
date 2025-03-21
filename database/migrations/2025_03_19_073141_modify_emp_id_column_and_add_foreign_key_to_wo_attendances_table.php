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
        Schema::table('wo_attendances', function (Blueprint $table) {
           
            $table->unsignedBigInteger('emp_id')->change();

            $table->foreign('emp_id')
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
        Schema::table('wo_attendances', function (Blueprint $table) {
            $table->dropForeign(['emp_id']);
        });
    }
};
