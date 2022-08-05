<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loads', function (Blueprint $table) {
            $table->integer('shipper_quick_pay_percent')->nullable()->after('shipper_payment_method');
            $table->string('shipper_factoring')->nullable()->after('shipper_quick_pay_percent');
            $table->string('shipper_factoring_ach_account_number')->nullable()->after('shipper_factoring');
            $table->string('shipper_factoring_ach_routing_number')->nullable()->after('shipper_factoring_ach_account_number');
            $table->string('shipper_factoring_zelle_phone')->nullable()->after('shipper_factoring_ach_routing_number');
            $table->string('shipper_factoring_zelle_email')->nullable()->after('shipper_factoring_zelle_phone');
            $table->boolean('has_noa')->nullable()->default(false)->after('shipper_factoring_zelle_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loads', function (Blueprint $table) {
            $table->dropColumn('shipper_quick_pay_percent');
            $table->dropColumn('shipper_factoring');
            $table->dropColumn('shipper_factoring_ach_account_number');
            $table->dropColumn('shipper_factoring_ach_routing_number');
            $table->dropColumn('shipper_factoring_zelle_phone');
            $table->dropColumn('shipper_factoring_zelle_email');
            $table->dropColumn('has_noa');
        });
    }
}
