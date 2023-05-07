<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('treatment_id')->nullable()->constrained('treatments');
            $table->foreignId('support_doctor_id')->nullable()->constrained('doctors');
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
        Schema::dropIfExists('support_doctors');
    }
}
