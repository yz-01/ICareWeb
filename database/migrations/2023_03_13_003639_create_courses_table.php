<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('hrdf_claimable')->comment('1=yes,2=no')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->integer('duration')->nullable();
            $table->string('venue')->nullable();
            $table->tinyInteger('online')->comment('1=online')->nullable();
            $table->string('banner')->nullable();
            $table->foreignId('trainer_id')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
