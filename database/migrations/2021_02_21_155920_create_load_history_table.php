<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('load_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('load_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->boolean('confirmed')->default(0);
            $table->text('info');

            $table->foreign('load_id')->references('id')->on('loads')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reviewer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('load_history');
    }
}
