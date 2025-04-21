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
        Schema::create('imp_email_lists', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('department');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('NO ACTION');
            $table->enum('status',['0','1'])->comment('1 for active 0 inactive');
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
        Schema::dropIfExists('imp_email_lists');
    }
};
