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
        Schema::create('wo_billing_structure', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('organisation_id');
            $table->foreign('organisation_id')->references('id')->on('organizations');
            $table->string('wo_number')->nullable();
            $table->string('billing_to')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email_id')->nullable();
            $table->string('billing_sac_code')->nullable();
            $table->string('billing_gst_no')->nullable();
            $table->string('billing_tax_mode')->nullable();
            $table->enum('show_service_charge', ['yes','no'])->nullable();
            $table->string('service_charge_rate')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_tax_rate')->nullable();

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
        Schema::dropIfExists('wo_billing_structure');
    }
};
