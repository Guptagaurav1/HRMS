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
        Schema::table('emp_education_details', function (Blueprint $table) {
            $table->integer('emp_diploma_year')->after('emp_twelve_doc')->nullable();
            $table->string('emp_diploma_percentage')->after('emp_diploma_year')->nullable();
            $table->string('emp_diploma_mode')->after('emp_diploma_percentage')->nullable();
            $table->string('emp_diploma')->after('emp_diploma_mode')->nullable();
            $table->string('emp_diploma_in')->after('emp_diploma')->nullable();
            $table->string('diploma_doc')->after('emp_diploma_in')->nullable();
            $table->integer('emp_doctorate_year')->after('post_grad_doc')->nullable();
            $table->string('emp_doctorate_percentage')->after('emp_doctorate_year')->nullable();
            $table->string('emp_doctorate_mode')->after('emp_doctorate_percentage')->nullable();
            $table->string('emp_doctorate')->after('emp_doctorate_mode')->nullable();
            $table->string('emp_doctorate_in')->after('emp_doctorate')->nullable();
            $table->string('doctorate_doc')->after('emp_doctorate_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emp_education_details', function (Blueprint $table) {
            $table->dropColumn([
                'emp_diploma_year',
                'emp_diploma_percentage',
                'emp_diploma_mode',
                'emp_diploma',
                'emp_diploma_in',
                'diploma_doc',
                'emp_doctorate_year',
                'emp_doctorate_percentage',
                'emp_doctorate_mode',
                'emp_doctorate',
                'emp_doctorate_in',
                'doctorate_doc',
            ]);
        });
    }
};
