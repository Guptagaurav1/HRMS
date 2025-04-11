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
        Schema::table('emp_send_doc', function (Blueprint $table) {
            $table->unsignedBigInteger('rec_id')->nullable()->comment('Recruitment Form Id')->after('id');
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_send_doc', function (Blueprint $table) {
            $table->dropColumn('rec_id');
        });
    }
};
