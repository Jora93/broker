<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drops', function($table) {
            $table->dropColumn('delivery_time');
            $table->string('delivery_time_from')->nullable();
            $table->string('delivery_time_to')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drops', function($table) {
            $table->string('delivery_time')->nullable();
            $table->dropColumn('delivery_time_from');
            $table->dropColumn('delivery_time_to');
        });
    }
}
