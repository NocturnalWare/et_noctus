<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('venue_id');
            $table->integer('main_contact_id');
            $table->string('name');
            $table->text('main_image');
            $table->text('facebook')->nullable();
            $table->text('ticket')->nullable();
            $table->text('website')->nullable();
            $table->datetime('event_date');
            $table->longtext('message');
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
        Schema::drop('shows');
    }
}
