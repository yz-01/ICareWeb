<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('patient_id')->nullable()->constrained('patients');
            $table->foreignId('nurse_id')->nullable()->constrained('nurses');
            $table->string('instruction')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
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
        Schema::dropIfExists('patient_calls');
    }
}
