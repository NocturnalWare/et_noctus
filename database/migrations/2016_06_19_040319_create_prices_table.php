<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('product_id');
            $table->float('xsmall')->nullable();
            $table->float('small')->nullable();
            $table->float('medium')->nullable();
            $table->float('large')->nullable();
            $table->float('xlarge')->nullable();
            $table->float('xxlarge')->nullable();
            $table->float('xxxlarge')->nullable();
            $table->float('onesize')->nullable();
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
        Schema::drop('prices');
    }
}
