<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->nullable()->constrained('agents');
            $table->foreignId('merchant_id')->nullable()->constrained('merchants');
            $table->foreignId('center_user_id')->nullable()->constrained('center_users');
            $table->foreignId('trainer_id')->nullable()->constrained('trainers');
            $table->foreignId('company_user_id')->nullable()->constrained('company_users');
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->string('in')->nullable();
            $table->string('out')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('point_transactions');
    }
}
