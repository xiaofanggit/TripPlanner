<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuggagesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luggages_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->index()->unsigned();
            $table->integer('luggage_id')->index()->unsigned();            
            $table->timestamps();
        });
        Schema::table('luggages_items', function($table) {
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('luggage_id')->references('id')->on('luggages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luggages_items');
    }
}
