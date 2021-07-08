<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('load_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('carrier_id')->nullable();
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('description')->nullable();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('carrier_id')->references('id')->on('carriers');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('load_id')->references('id')->on('loads');

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
        Schema::dropIfExists('documents');
    }
}
