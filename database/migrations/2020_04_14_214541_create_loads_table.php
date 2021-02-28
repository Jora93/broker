<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('carrier_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('dispatcher_id');
            $table->string('status');
            $table->string('product');
            $table->string('purchase_order_number');
            $table->string('trailer_size');
            $table->string('customer_costs_rate_per_unit');
            $table->string('carrier_costs_rate_per_unit');
            $table->string('shipper_company');
            $table->string('shipper_phone');
            $table->string('shipper_phone_extension');
            $table->string('shipper_location_POS');
            $table->string('shipper_customer_POS');
            $table->string('shipper_address1');
            $table->string('shipper_fax');
            $table->string('shipper_address2');
            $table->string('shipper_quantity');
            $table->string('shipper_type');
            $table->string('shipper_city');
            $table->string('shipper_weight');
            $table->string('shipper_state');
            $table->string('shipper_value');
            $table->string('shipper_zip_code');
            $table->string('shipper_pickup_date');
            $table->string('shipper_pickup_number');
            $table->string('shipper_pickup_time');
            $table->string('shipper_notes');
            $table->string('truck_number');
            $table->string('trailer_number');
            $table->string('driver');
            $table->string('driver_number');
            $table->string('pro_number');
            $table->string('driver_email');
            $table->boolean('changed')->default(false);

            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('dispatcher_id')->references('id')->on('dispatchers')->onDelete('cascade');

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
        Schema::dropIfExists('loads');
    }
}
