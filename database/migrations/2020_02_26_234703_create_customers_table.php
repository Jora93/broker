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
            $table->unsignedBigInteger('company_id');

            $table->string('status');
            $table->string('company')->unique();
            $table->string('phone')->unique();
            $table->string('address1')->unique();
            $table->string('address2')->unique()->nullable();
            $table->string('phone_extension')->unique()->nullable();
            $table->string('fax')->unique()->nullable();
            $table->string('city');
            $table->string('email')->unique();
            $table->string('state');
            $table->string('zip_code');
            $table->integer('credit_limit');
            $table->string('currency');
            $table->string('note');

            $table->string('billing_company')->unique();
            $table->string('billing_phone')->unique();
            $table->string('billing_address1')->unique();
            $table->string('billing_address2')->unique()->nullable();
            $table->string('billing_phone_extension')->unique()->nullable();
            $table->string('billing_fax')->unique()->nullable();
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zip_code');

            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
