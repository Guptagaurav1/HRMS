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
        Schema::table('work_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('wo_state')->nullable()->change();
            $table->foreign('wo_state')->references('id')->on('states');

            $table->unsignedBigInteger('wo_city')->nullable()->change();
            $table->foreign('wo_city')->references('id')->on('cities');

            $table->integer('wo_pin')->nullable()->change();

            $table->unsignedBigInteger('wo_invoice_state')->nullable();
            $table->foreign('wo_invoice_state')->references('id')->on('states');

            $table->unsignedBigInteger('wo_invoice_city')->nullable();
            $table->foreign('wo_invoice_city')->references('id')->on('cities');

            $table->integer('wo_invoice_pincode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('work_orders', function (Blueprint $table) {
           // Drop foreign keys
           $table->dropForeign(['wo_state']);
           $table->dropForeign(['wo_city']);
           $table->dropForeign(['wo_invoice_state']);
           $table->dropForeign(['wo_invoice_city']);

           // Drop columns
           $table->dropColumn('wo_invoice_state');
           $table->dropColumn('wo_invoice_city');
           $table->dropColumn('wo_invoice_pincode');
        });
    }
};
