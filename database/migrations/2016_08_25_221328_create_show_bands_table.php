<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowBandsTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_bands', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('band_id');
            $table->integer('show_id');
            $table->integer('band_contact_id')->nullable();
            $table->text('ticket_sales')->nullable();
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
        Schema::drop('show_bands');
    }
}
