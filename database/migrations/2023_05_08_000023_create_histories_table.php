<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('treatment_id')->nullable()->constrained('treatments');
            $table->string('title')->nullable();
            $table->string('doctor_remark')->nullable();
            $table->string('nurse_remark')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('patient_healthy_status')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
