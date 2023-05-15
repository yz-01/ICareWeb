<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('history_id')->nullable()->constrained('histories');
            $table->foreignId('medicine_id')->nullable()->constrained('medicines');
            $table->string('last_time_usage_of_medicine')->nullable();
            $table->string('usage_of_medicine')->nullable();
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
        Schema::dropIfExists('history_medicines');
    }
}
