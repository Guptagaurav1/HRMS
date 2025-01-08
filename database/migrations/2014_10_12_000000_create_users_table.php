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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('user_type');
            $table->integer('department_id');
            $table->integer('company_id');
            $table->date('dob');
            $table->enum('status', ['1', '0'])->default('1');
            $table->rememberToken();
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
