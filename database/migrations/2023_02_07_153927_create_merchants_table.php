<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->string('ssm_document')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('nature_business')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->tinyInteger('is_own_company')->comment('0=No, 1=Yes')->nullable();
            $table->tinyInteger('member_number')->comment('0=less than 9, 1=10 or more than 10, 2=more than 50, 3=more than 100, 4=more than 200')->nullable();
            $table->tinyInteger('is_hrdf')->comment('0=No, 1=Yes, 2=Not Sure')->nullable();
            $table->tinyInteger('promote_product_id')->nullable();
            $table->foreignId('security_question_id')->nullable()->constrained('security_questions');
            $table->string('security_answer')->nullable();
            $table->foreignId('agent_id')->nullable()->constrained('agents');
            $table->string('agent_code')->nullable();
            $table->integer('point_balance')->default(0);
            $table->integer('point_usage')->default(0)->comment('Total point this student has used');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->tinyInteger('is_approve')->comment('0=No, 1=Yes')->nullable();
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
        Schema::dropIfExists('merchants');
    }
}
