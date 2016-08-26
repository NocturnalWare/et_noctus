<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandMemberPreviousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_member_previous', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('contact_id');
            $table->integer('band_id');
            $table->string('instrument');
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
        Schema::drop('band_member_previous');
    }
}
