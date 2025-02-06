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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('wo_internal_ref_no')->nullable();
            $table->unsignedBigInteger('wo_oraganisation_name')->nullable();
            $table->foreign('wo_oraganisation_name')->references('id')->on('organizations')->onDelete('NO ACTION');

            $table->string('wo_number')->unique();
            $table->string('prev_wo_no')->nullable();
            $table->date('wo_date_of_issue')->nullable();
            $table->string('wo_project_number')->nullable();
            $table->string('wo_project_name')->nullable();
            $table->string('wo_concern_ministry')->nullable();
            $table->string('wo_empanelment_reference')->nullable();
            $table->string('wo_no_of_resources')->nullable();
            $table->string('wo_project_duration')->nullable();
            $table->string('wo_project_duration_day')->nullable();
            $table->date('wo_start_date')->nullable();
            $table->date('wo_end_date')->nullable();
            $table->string('wo_location')->nullable();
            $table->string('wo_city')->nullable();
            $table->integer('wo_amount')->nullable();
            $table->string('wo_project_coordinator')->nullable();

            $table->string('wo_invoice_name')->nullable();

            $table->string('wo_invoice_address')->nullable();
            $table->string('wo_state')->nullable();
            $table->string('wo_pin')->nullable();
            $table->string('wo_remarks')->nullable();
            $table->string('wo_status')->nullable();;
            $table->date('wo_created_date')->nullable();;
            $table->string('wo_entry_by')->nullable();;
            $table->string('wo_attached_file')->nullable();

            $table->string('amendment_number')->nullable();
            $table->string('amendment_date')->nullable();
            $table->string('previous_order_no')->nullable();
            $table->string('billing_structure')->nullable();

            $table->enum('status', [0,1])->default(1)->comment('1 for active, 0 for inactive');
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
        Schema::dropIfExists('work_orders');
    }
};
