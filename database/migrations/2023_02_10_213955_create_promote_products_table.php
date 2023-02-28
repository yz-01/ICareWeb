<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promote_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->nullable()->constrained('merchants');
            $table->foreignId('center_user_id')->nullable()->constrained('center_users');
            $table->foreignId('company_user_id')->nullable()->constrained('company_users');
            $table->string('product1')->nullable();
            $table->string('product2')->nullable();
            $table->string('product3')->nullable();
            $table->string('product4')->nullable();
            $table->string('product5')->nullable();
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
        Schema::dropIfExists('promote_products');
    }
}
