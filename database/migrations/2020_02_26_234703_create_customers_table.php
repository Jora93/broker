<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
            $table->string('status');
            $table->string('phone');
            $table->string('address');
            $table->string('product');
            $table->string('currency');
            $table->integer('creditLimit');
            $table->boolean('smartWayCarriersPreferred');
            $table->string('billingCompany');
            $table->string('billingPhone');
            $table->string('billingAddress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
