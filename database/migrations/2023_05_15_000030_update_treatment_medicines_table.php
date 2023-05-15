<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTreatmentMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment_medicines', function (Blueprint $table) {
            $table->string('total_usage')->nullable()->default(0)->after('medicine_id');
        });
    }
}
