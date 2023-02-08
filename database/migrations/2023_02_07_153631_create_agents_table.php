<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('identity_card')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('postal_code')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('state_id')->nullable()->constrained('states');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
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
        Schema::dropIfExists('agents');
    }
}
