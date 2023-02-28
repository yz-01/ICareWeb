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
            $table->string('banner')->nullable();
            $table->foreignId('security_question_id')->nullable()->constrained('security_questions');
            $table->string('security_answer')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->tinyInteger('employment_status')->comment('1=Employee, 2=Employer, 3=Unemployed, 4=Retiree, 5=Student')->nullable();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('own_referral_code')->nullable();
            $table->tinyInteger('is_referral_code_use')->comment('1=No, 2=Yes')->nullable();
            $table->integer('point_balance')->default(0);
            $table->integer('point_usage')->default(0)->comment('Total point this customer has used');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->tinyInteger('is_approve')->comment('1=No, 2=Yes')->nullable();
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
