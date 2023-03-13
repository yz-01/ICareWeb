<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_registration_number')->nullable();
            $table->string('person_in_charge')->nullable();
            $table->string('ssm_document')->nullable();
            $table->string('company_logo')->nullable();
            $table->foreignId('nature_business_id')->nullable()->constrained('nature_businesses');
            $table->string('email')->unique();
            $table->string('banner')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->tinyInteger('is_own_company')->comment('1=No, 2=Yes')->nullable();
            $table->tinyInteger('member_number')->comment('1=less than 9, 2=10 or more than 10, 3=more than 50, 4=more than 100, 5=more than 200')->nullable();
            $table->tinyInteger('is_hrdf')->comment('1=No, 2=Yes, 3=Not Sure')->nullable();
            $table->tinyInteger('promote_product_id')->nullable();
            $table->foreignId('security_question_id')->nullable()->constrained('security_questions');
            $table->string('security_answer')->nullable();
            $table->string('own_referral_code')->nullable();
            $table->tinyInteger('is_referral_code_use')->comment('1=No, 2=Yes')->nullable();
            $table->integer('point_balance')->default(0);
            $table->integer('point_usage')->default(0)->comment('Total point this company has used');
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
        Schema::dropIfExists('center_users');
    }
}
