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
        Schema::create('tender_lists', function (Blueprint $table) {
            $table->id();
            $table->string('scope_of_work');
            $table->string('dept_name');
            $table->string('dept_address')->nullable();
            $table->string('govt');
            $table->string('tender_location')->nullable();
            $table->string('tender_number');
            $table->date('date')->nullable();
            $table->date('submission_date')->nullable();
            $table->string('emd')->nullable();
            $table->string('estimate')->nullable();
            $table->string('performance_security')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('technical_qualified')->nullable();
            $table->string('tender_status')->nullable();
            $table->string('wo')->nullable();
            $table->string('status')->nullable();
            $table->string('reference')->nullable();
            $table->string('managed')->nullable();
            $table->string('tender_attachment')->nullable();
            $table->string('lead_status')->nullable();
            $table->string('win_remarks')->nullable();
            $table->string('lose_remarks')->nullable();
            $table->integer('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->integer('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tender_lists');
    }
};
