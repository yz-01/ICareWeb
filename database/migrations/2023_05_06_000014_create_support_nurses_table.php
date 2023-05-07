<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_nurses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('treatment_id')->nullable()->constrained('treatments');
            $table->foreignId('support_nurse_id')->nullable()->constrained('nurses');
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
        Schema::dropIfExists('support_nurses');
    }
}
