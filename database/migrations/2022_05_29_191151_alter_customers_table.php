<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('state')->nullable()->change();
            $table->string('zip_code')->nullable()->change();
            $table->string('currency')->nullable()->change();
            $table->string('billing_city')->nullable()->change();
            $table->string('billing_state')->nullable()->change();
            $table->string('billing_zip_code')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
