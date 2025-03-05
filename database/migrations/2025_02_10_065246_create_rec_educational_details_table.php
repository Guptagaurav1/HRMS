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
        Schema::create('rec_educational_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rec_id')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruitment_forms');
            $table->string('10th_percentage')->nullable();
            $table->string('10th_year')->nullable();
            $table->string('10th_board')->nullable();
            $table->string('10th_doc')->nullable();
            $table->string('12th_percentage')->nullable();
            $table->string('12th_year')->nullable();
            $table->string('12th_board')->nullable();
            $table->string('12th_doc')->nullable();
            $table->string('grad_name')->nullable();
            $table->string('grad_percentage')->nullable();
            $table->string('grad_year')->nullable();
            $table->string('grad_mode')->nullable();
            $table->string('grad_doc')->nullable();
            $table->string('post_grad_name')->nullable();
            $table->string('post_grad_percentage')->nullable();
            $table->string('post_grad_year')->nullable();
            $table->string('post_grad_mode')->nullable();
            $table->string('post_grad_doc')->nullable();
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
        Schema::dropIfExists('rec_educational_details');
    }
};
