<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carriers', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('zip_code')->nullable()->change();
            $table->string('insurance1_type')->nullable()->change();
            $table->string('insurance1_amount')->nullable()->change();
            $table->date('insurance1_expires_on')->nullable()->change();
            $table->string('insurance2_type')->nullable()->change();
            $table->string('insurance2_amount')->nullable()->change();
            $table->date('insurance2_expires_on')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carriers', function (Blueprint $table) {
            //
        });
    }
}
