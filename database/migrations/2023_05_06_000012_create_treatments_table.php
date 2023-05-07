<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('patient_id')->nullable()->constrained('patients');
            $table->foreignId('pic_doctor_id')->nullable()->constrained('doctors');
            $table->foreignId('pic_nurse_id')->nullable()->constrained('nurses');
            $table->foreignId('ward_id')->nullable()->constrained('wards');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->nullable()->default(1);
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
        Schema::dropIfExists('treatments');
    }
}
