<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCodesTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_codes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('promotion_id');
            $table->string('code');
            $table->string('email')->nullable();
            $table->string('owner')->nullable();
            $table->integer('total')->default(1);
            $table->integer('used')->default(0);
            $table->datetime('expires');
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
        Schema::drop('promotion_codes');
    }
}
