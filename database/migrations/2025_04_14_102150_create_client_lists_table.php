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
        Schema::create('client_lists', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('department_name')->nullable();
            $table->string('consern_ministry')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_designation')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_landline')->nullable();
            $table->string('contact_fax')->nullable();
            $table->string('d_maker_name')->nullable();
            $table->string('d_maker_email')->nullable();
            $table->string('d_maker_phone')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('p_email')->nullable();
            $table->string('p_contact')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_address')->nullable();
            $table->unsignedBigInteger('company_state')->nullable();
            $table->foreign('company_state')->references('id')->on('states');
            $table->unsignedBigInteger('company_city')->nullable();
            $table->foreign('company_city')->references('id')->on('cities');
            $table->string('company_pincode')->nullable();
            $table->unsignedBigInteger('company_industry')->nullable();
            $table->foreign('company_industry')->references('id')->on('industries')->onDelete('NO ACTION');
            $table->string('company_type')->nullable();
            $table->string('reference')->nullable();
            $table->text('remarks')->nullable();
            $table->string('file_name')->nullable();
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
        Schema::dropIfExists('client_lists');
    }
};
