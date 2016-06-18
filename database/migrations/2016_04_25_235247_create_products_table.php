<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sort_order');
            $table->float('cost');
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->string('display_price_min');
            $table->string('display_price_max');
            $table->string('paypal');
            $table->integer('active')->nullable();
            $table->integer('onsale')->nullable();
            $table->integer('upcomming')->nullable();
            $table->integer('preorder')->nullable();
            $table->integer('xsmall')->nullable();
            $table->integer('small')->nullable();
            $table->integer('medium')->nullable();
            $table->integer('large')->nullable();
            $table->integer('xlarge')->nullable();
            $table->integer('xxlarge')->nullable();
            $table->integer('xxxlarge')->nullable();
            $table->integer('onesize')->nullable();
            $table->string('main_image');
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
        Schema::drop('products');
    }
}
