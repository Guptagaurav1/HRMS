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
        if (!Schema::hasTable('users')) {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            $table->integer('id');
            $table->primary('id')->increments('id');
        
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->bigInteger('phone');
            $table->integer('user_type')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->foreign('user_type')->references('id')->on('roles')->onDelete('NO ACTION');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('NO ACTION');
            $table->foreign('company_id')->references('id')->on('company_master')->onDelete('NO ACTION');

            $table->date('dob');
            $table->enum('status', ['1', '0'])->default('1');
            
            $table->integer('updated_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('deleted_by')->nullable();
           
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('NO ACTION');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
