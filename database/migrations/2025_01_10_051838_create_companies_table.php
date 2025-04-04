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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('mobile');
            $table->string('email');
            $table->string('address');
            $table->string('registration_no');
            $table->string('gstin_no');
            $table->string('sac_code');
            $table->string('service_tax_registration_no');
            $table->string('pan_no');
            $table->string('website');
            $table->string('bank_payee_name');
            $table->string('bank_name');
            $table->string('account_no');
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->string('branch_address');
            $table->string('company_city');
            $table->string('payment_type');
            $table->string('bank_email');
            $table->string('twitter_link');
            $table->string('facebook_link');
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link');
            $table->string('instagram_link');
            $table->string('pinterest_link');
            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('NO ACTION');
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
        Schema::dropIfExists('companies');
    }
};
