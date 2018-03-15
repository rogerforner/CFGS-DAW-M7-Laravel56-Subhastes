<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->integer('stock_id')->unsigned();
            $table->timestamps();
            $table->foreign('stock_id')->references('id')->on('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
