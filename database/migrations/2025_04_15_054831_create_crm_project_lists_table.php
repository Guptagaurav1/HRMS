<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Table renamed, previous this table name is project_list.
     */
    public function up(): void
    {
        Schema::create('crm_project_lists', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client_lists');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('lead_category_lists');
            $table->string('project_email')->nullable();
            $table->string('project_contact')->nullable();
            $table->string('amount')->nullable();
            $table->integer('no_of_requirement')->nullable();
            $table->string('project_duration')->nullable();
            $table->string('ref_project_id')->nullable();
            $table->string('tender_no')->nullable();
            $table->string('tender_valid_upto')->nullable();
            $table->string('per_inv_no')->nullable();
            $table->date('per_inv_date')->nullable();
            $table->string('letter_ref_no')->nullable();
            $table->date('letter_ref_date')->nullable();
            $table->string('p_contact_name')->nullable();
            $table->string('p_contact_email')->nullable();
            $table->string('p_contact_designation')->nullable();
            $table->string('p_contact_phone')->nullable();
            $table->string('p_contact_landline')->nullable();
            $table->text('scope_of_project')->nullable();
            $table->text('remarks')->nullable();
            $table->string('attachment')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['1','0'])->default('1');
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
        Schema::dropIfExists('crm_project_lists');
    }
};
