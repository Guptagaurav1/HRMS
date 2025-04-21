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
        Schema::create('pcg_client_lists', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('email')->nullable();
            $table->string('office_location')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('designation')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('pcg_client_lists');
    }
};
