<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->nullable()->constrained('agents');
            $table->foreignId('merchant_id')->nullable()->constrained('merchants');
            $table->foreignId('center_user_id')->nullable()->constrained('center_users');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->foreignId('company_user_id')->nullable()->constrained('company_users');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('socials');
    }
}
