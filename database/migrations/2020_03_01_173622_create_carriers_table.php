<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
            $table->string('status');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('address');
            $table->string('currency');
            $table->boolean('preferredCarrierStatus');
            $table->boolean('smartwayCertified');
            $table->string('payeeCompany');
            $table->string('payeePhone')->nullable();
            $table->string('payeeAddress');
            $table->string('mcNumber');
            $table->integer('dotNumber');
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
        Schema::dropIfExists('carriers');
    }
}
