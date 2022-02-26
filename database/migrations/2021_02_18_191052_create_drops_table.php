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
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('fax')->nullable();
            $table->string('address1')->nullable();
            $table->string('delivered_number')->nullable();
            $table->string('address2')->nullable();
            $table->date('delivery_date');
            $table->string('city')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('BOL_payment_term')->nullable();
            $table->string('delivery_location_bol_number')->nullable();
            $table->string('delivery_location_zip_code')->nullable();
            $table->string('delivery_time_from')->nullable();
            $table->string('delivery_time_to')->nullable();
            $table->string('freight_class')->nullable();
            $table->string('national_motor_freight_class')->nullable();
            $table->string('bol_product')->nullable();
            $table->string('delivery_location_quantity')->nullable();
            $table->string('item_type')->nullable()->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('delivery_location_weight')->nullable();
            $table->string('haz_mat')->nullable();
            $table->string('bol_notes')->nullable();
            $table->string('delivery_location_notes')->nullable();
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
