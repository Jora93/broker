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
            $table->string('company');
            $table->string('phone');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('fax')->nullable();
            $table->string('city');
            $table->string('email')->nullable();
            $table->string('state');
            $table->string('zip_code');
            $table->integer('credit_limit');
            $table->string('currency');
            $table->string('note')->nullable();

            $table->string('billing_company');
            $table->string('billing_phone');
            $table->string('billing_address1');
            $table->string('billing_address2')->nullable();
            $table->string('billing_phone_extension')->nullable();
            $table->string('billing_fax')->nullable();
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zip_code');

            $table->timestamps();

            $table->unique(['company', 'company_id']);
            $table->unique(['phone', 'company_id']);
            $table->unique(['address1', 'company_id']);
            $table->unique(['address2', 'company_id']);
            $table->unique(['phone_extension', 'company_id']);
            $table->unique(['fax', 'company_id']);
            $table->unique(['email', 'company_id']);

            $table->unique(['billing_company', 'company_id']);
            $table->unique(['billing_phone', 'company_id']);
            $table->unique(['billing_address1', 'company_id']);
            $table->unique(['billing_address2', 'company_id']);
            $table->unique(['billing_phone_extension', 'company_id']);
            $table->unique(['billing_fax', 'company_id']);

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
