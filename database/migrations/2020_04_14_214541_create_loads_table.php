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
            $table->string('consignee_company');
            $table->string('consignee_phone');
            $table->string('consignee_phone_extension');
            $table->string('consignee_contact_name');
            $table->string('consignee_fax');
            $table->string('consignee_address1');
            $table->string('consignee_delivered_number');
            $table->string('consignee_address2');
            $table->string('consignee_delivery_date');
            $table->string('consignee_city');
            $table->string('consignee_delivery_time');
            $table->string('consignee_delivery_state');
            $table->string('consignee_BOL_payment_term');
            $table->string('consignee_delivery_location_bol_number');
            $table->string('consignee_delivery_location_zip_code');
            $table->string('consignee_freight_class');
            $table->string('consignee_national_motor_freight_class');
            $table->string('consignee_bol_product');
            $table->string('consignee_delivery_location_quantity');
            $table->string('consignee_item_type');
            $table->string('consignee_length');
            $table->string('consignee_width');
            $table->string('consignee_height');
            $table->string('consignee_delivery_location_weight');
            $table->string('consignee_haz_mat');
            $table->string('consignee_bol_notes');
            $table->string('consignee_delivery_location_notes');
            $table->string('dispatcher_user_id'); //todo make new table
            $table->string('truck_number');
            $table->string('trailer_number');
            $table->string('driver');
            $table->string('driver_number');
            $table->string('pro_number');
            $table->string('driver_email');
            $table->string('carrier_costs_units_id');
            $table->string('carrier_costs_rate_per_unit');
            $table->string('stops');
            $table->string('cost_per_stop');
            $table->string('miles');
            $table->string('fuel_surcharge_type');
            $table->string('driver_advance_gross');

            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

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
