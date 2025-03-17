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
        Schema::table('emp_id_proofs', function (Blueprint $table) {
            $table->string('permanent_doc_type')->after('pan_card_doc')->nullable()->comment('permanent address doc type');
            $table->string('permanent_add_doc')->after('permanent_doc_type')->nullable();
            $table->string('correspondence_doc_type')->after('permanent_add_doc')->nullable()->comment('local address doc type');;
            $table->string('correspondence_add_doc')->after('correspondence_doc_type')->nullable();
            $table->string('bank_doc')->after('correspondence_add_doc')->nullable()->comment('bank document');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_id_proofs', function (Blueprint $table) {
            $table->dropColumn('permanent_doc_type');
            $table->dropColumn('permanent_add_doc');
            $table->dropColumn('correspondence_doc_type');
            $table->dropColumn('correspondence_add_doc');
            $table->dropColumn('bank_doc');
        });
    }
};
