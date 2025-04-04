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
        if (!Schema::hasTable('districts')) {
            Schema::create('districts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('country_id');
                $table->foreign('country_id')->references('id')->on('countries');
                $table->unsignedBigInteger('state_id');
                $table->foreign('state_id')->references('id')->on('states');
                $table->string('district_name');
                $table->string('slug');
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
