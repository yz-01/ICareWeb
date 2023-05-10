<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->string('price')->nullable()->after('description');
            $table->string('supplier')->nullable()->after('price');
            $table->string('in_stock')->nullable()->default(1)->after('price');
        });
    }
}
