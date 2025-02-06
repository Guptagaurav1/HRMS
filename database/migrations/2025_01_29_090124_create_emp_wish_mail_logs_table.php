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
        Schema::create('emp_wish_mail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code');
            $table->string('emp_name');
            $table->string('emp_email');
            $table->date('emp_dob')->nullable();
            $table->date('emp_dom')->nullable();
            $table->date('emp_doj')->nullable();
            $table->text('message')->nullable();
            $table->string('attachment')->nullable();
            $table->enum('wish_type', ['Birthday','Marriage','Joining'])->nullable();
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
        Schema::dropIfExists('emp_wish_mail_logs');
    }
};
