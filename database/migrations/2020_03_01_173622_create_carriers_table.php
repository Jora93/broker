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
            $table->unsignedBigInteger('company_id');

            $table->date('contracted_on')->nullable();
            $table->string('status');
            $table->string('company')->unique();
            $table->string('phone')->unique();
            $table->string('dba_name')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('address1')->unique();
            $table->string('address2')->unique()->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('fax')->unique()->nullable();
            $table->string('city');
            $table->string('email')->unique()->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('carrier_fee')->nullable();
            $table->integer('preferred_carrier_status')->nullable();
            $table->integer('smart_way_certified')->nullable();
            $table->integer('carb_compliant')->nullable();
            $table->integer('use_dba_name')->nullable();
            $table->integer('require_carrier_agreement')->nullable();
            $table->integer('flagged')->nullable();
            $table->string('flag')->nullable();
            $table->string('note')->nullable();

            $table->string('payee_company')->unique()->nullable();
            $table->string('payee_phone')->unique()->nullable();
            $table->string('payee_dba_name')->nullable();
            $table->string('payee_phone_extension')->nullable();
            $table->string('payee_address1')->unique()->nullable();
            $table->string('payee_cell_phone')->nullable();
            $table->string('payee_address2')->unique()->nullable();
            $table->string('payee_fax')->unique()->nullable();
            $table->string('payee_city')->nullable();
            $table->string('payee_state')->nullable();
            $table->string('payee_fed_id')->nullable();
            $table->string('payee_zip_code')->nullable();

            $table->string('factoring_company_name')->nullable();
            $table->string('factoring_phone')->nullable();
            $table->string('factoring_remit_address')->nullable();
            $table->string('factoring_remit_email')->nullable();
            $table->string('factoring_remit_address2')->nullable();
            $table->string('factoring_remit_city')->nullable();
            $table->string('factoring_remit_zipcode')->nullable();
            $table->string('factoring_state')->nullable();
            $table->string('mc_number')->nullable();
            $table->string('dot_number')->nullable();


            $table->string('insurance1_type')->nullable();
            $table->string('insurance1_insurer')->nullable();
            $table->string('insurance1_amount')->nullable();
            $table->string('insurance1_policy_number')->nullable();
            $table->date('insurance1_effective_on')->nullable();
            $table->date('insurance1_expires_on')->nullable();
            $table->string('insurance1_phone')->nullable();
            $table->string('insurance1_email')->nullable();


            $table->string('insurance2_type')->nullable();
            $table->string('insurance2_insurer')->nullable();
            $table->string('insurance2_amount')->nullable();
            $table->string('insurance2_policy_number')->nullable();
            $table->date('insurance2_effective_on')->nullable();
            $table->date('insurance2_expires_on')->nullable();
            $table->string('insurance2_phone')->nullable();
            $table->string('insurance2_email')->nullable();

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
        Schema::dropIfExists('carriers');
    }
}
