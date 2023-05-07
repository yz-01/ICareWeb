<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTreatmentMedicines2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatment_medicines', function (Blueprint $table) {
            $table->string('usage_of_medicine')->nullable()->after('medicine_id');
        });
    }
}
