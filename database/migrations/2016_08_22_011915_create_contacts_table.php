<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('main_phone_id')->nullable();
            $table->integer('main_email_id')->nullable();
            $table->string('f_name');
            $table->string('l_name')->nullable();
            $table->string('street1')->nullable();
            $table->string('street2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();//string for Canada -_-
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('snapchat')->nullable();
            $table->text('website')->nullable();
            $table->longtext('notes')->nullable();
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
        Schema::drop('contacts');
    }
}
