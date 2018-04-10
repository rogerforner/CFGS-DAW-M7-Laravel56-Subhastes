<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionHasWinnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_has_winner', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auction_id')->unsigned()->unique();
            $table->integer('bidding_id')->unsigned()->nullable(); 
            $table->timestamps();
            $table->foreign('auction_id')->references('id')->on('auctions');
            $table->foreign('bidding_id')->references('id')->on('biddings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_has_winner');
    }
}
