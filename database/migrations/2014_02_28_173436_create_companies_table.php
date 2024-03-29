<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('mc_number')->unique();
            $table->string('phone_one')->unique();
            $table->string('phone_two')->nullable();
            $table->string('address')->nullable()->unique();
            $table->integer('invoice_last_number')->nullable()->unique();
            $table->integer('load_last_number')->nullable()->unique();
            $table->integer('invite_alias')->unique()->default(time());
            $table->string('logo')->nullable()->unique();
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
        Schema::dropIfExists('companies');
    }
}
