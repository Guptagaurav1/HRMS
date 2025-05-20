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
        Schema::create('lead_lists', function (Blueprint $table) {
            $table->id();
            $table->string('lead_uni_id');
            $table->string('lead_title');
            $table->string('lead_slug');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('crm_project_lists');
            $table->date('deadline');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('lead_category_lists');
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->references('id')->on('lead_source_lists')->nullable();
            $table->string('lead_file')->nullable();
            $table->text('description')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('status', ['1', '0'])->default('1');
            $table->enum('lead_status', ['open','win','lose'])->default('open');
            $table->text('status_remarks')->nullable();
            $table->text('lose_remarks')->nullable();
            $table->string('wo_no')->nullable();
            $table->integer('closing_amount')->nullable();
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
        Schema::dropIfExists('lead_lists');
    }
};
