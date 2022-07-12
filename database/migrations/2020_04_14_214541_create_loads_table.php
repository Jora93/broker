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
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('carrier_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('dispatcher_id')->nullable();
            $table->integer('load_number')->unique();
            $table->integer('invoice_number')->unique()->nullable();
            $table->date('invoice_date')->nullable();
            $table->date('invoice_past_due_date')->nullable();
            $table->string('status')->nullable();
            $table->string('product')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('trailer_size')->nullable();
            $table->string('customer_costs_rate_per_unit')->default(0);
            $table->string('carrier_costs_rate_per_unit')->default(0);
            $table->string('carrier_equipment_id')->nullable();
            $table->string('shipper_company')->nullable();
            $table->string('shipper_phone')->nullable();
            $table->string('shipper_phone_extension')->nullable();
            $table->string('shipper_location_POS')->nullable();
            $table->string('shipper_customer_POS')->nullable();
            $table->string('shipper_address1')->nullable();
            $table->string('shipper_fax')->nullable();
            $table->string('shipper_address2')->nullable();
            $table->string('shipper_quantity')->nullable();
            $table->string('shipper_type')->nullable();
            $table->string('shipper_city');
            $table->string('shipper_weight')->nullable();
            $table->string('shipper_state');
            $table->string('shipper_value')->nullable();
            $table->string('shipper_zip_code')->nullable();
            $table->date('shipper_pickup_date');
            $table->string('shipper_pickup_number')->nullable();
            $table->string('shipper_pickup_time_from')->nullable();
            $table->string('shipper_pickup_time_to')->nullable();
            $table->boolean('shipper_pickup_time_appt')->nullable();
            $table->boolean('shipper_pickup_time_fcfs')->nullable();
            $table->string('shipper_payment_method')->nullable();
            $table->string('shipper_notes')->nullable();
            $table->string('truck_number')->nullable();
            $table->string('trailer_number')->nullable();
            $table->string('driver')->nullable();
            $table->string('driver_number')->nullable();
            $table->string('pro_number')->nullable();
            $table->string('driver_email')->nullable();
            $table->boolean('changed')->default(false);

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
