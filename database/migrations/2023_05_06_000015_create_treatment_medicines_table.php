<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('treatment_id')->nullable()->constrained('treatments');
            $table->foreignId('medicine_id')->nullable()->constrained('medicines');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment_medicines');
    }
}
