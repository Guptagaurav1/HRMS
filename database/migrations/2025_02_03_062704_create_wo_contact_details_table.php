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
        if (!Schema::hasTable('wo_contact_details')) {
            Schema::create('wo_contact_details', function (Blueprint $table) {
                $table->id();            
                $table->unsignedBigInteger('work_order_id')->nullable();
                $table->foreign('work_order_id')->references('id')->on('work_orders')->onDelete('NO ACTION');
                $table->string('wo_client_contact_person')->nullable();;
                $table->string('wo_client_designation')->nullable();;
                $table->string('wo_client_contact')->nullable();;
                $table->string('wo_client_email')->nullable();;
                $table->string('wo_client_remarks')->nullable();;

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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wo_contact_details');
    }
};
