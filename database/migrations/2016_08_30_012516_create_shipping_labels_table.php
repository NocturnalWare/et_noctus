<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cart_id');
            $table->string('easypost_id');
            $table->string('tracking_code');
            $table->string('easypost_tracking');
            $table->string('label_url');
            $table->string('created');
            $table->string('rate');
            $table->string('carrier');
            $table->string('shipment_id');
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
        Schema::drop('shipping_labels');
    }
}
