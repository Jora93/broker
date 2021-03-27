<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('time_zone');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('toll_free_phone')->nullable();
            $table->string('state');
            $table->string('fax')->nullable();
            $table->string('zip_code');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('default_currency');
            $table->string('fed_id')->nullable();
            $table->string('scac')->nullable();
            //
            $table->longText('confirmation_note')->nullable();
            $table->longText('rate_quote_terms_conditions')->nullable();
            $table->longText('bill_of_lading_terms_conditions')->nullable();
            $table->longText('invoice_terms_conditions')->nullable();

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
        Schema::dropIfExists('general_settings');
    }
}
