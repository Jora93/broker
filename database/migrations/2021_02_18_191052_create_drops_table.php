<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('load_id');
            $table->string('company');
            $table->string('phone');
            $table->string('phone_extension');
            $table->string('contact_name');
            $table->string('fax');
            $table->string('address1');
            $table->string('delivered_number');
            $table->string('address2');
            $table->string('delivery_date');
            $table->string('city');
            $table->string('delivery_time');
            $table->string('delivery_state');
            $table->string('BOL_payment_term');
            $table->string('delivery_location_bol_number');
            $table->string('delivery_location_zip_code');
            $table->string('freight_class');
            $table->string('national_motor_freight_class');
            $table->string('bol_product');
            $table->string('delivery_location_quantity');
            $table->string('item_type');
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('delivery_location_weight');
            $table->string('haz_mat');
            $table->string('bol_notes');
            $table->string('delivery_location_notes');
            $table->timestamps();

            $table->foreign('load_id')->references('id')->on('loads')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drops');
    }
}
