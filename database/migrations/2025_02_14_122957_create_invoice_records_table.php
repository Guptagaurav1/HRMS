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
        Schema::create('invoice_records', function (Blueprint $table) {
            $table->id();
            $table->string('ir_invoice_number');
            $table->string('ir_wo');
            $table->string('ir_month');
            $table->string('ir_sub_total')->nullable();
            $table->string('ir_gst_mode')->nullable()->comment('if igst then 18 % and if cgst and sgst then 18 is 9 + 9');;
            $table->string('gst_rate')->nullable();
            $table->string('gst_value')->nullable();
            $table->enum('show_service_charge', ['yes', 'no'])->default('no');
            $table->string('service_charge_rate')->nullable()->comment('if show service charge on invoice');
            $table->string('service_charge_value')->nullable();
            $table->string('ir_grand_total')->nullable();
            $table->string('ir_add_datetime')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('invoice_records');
    }
};
