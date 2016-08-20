<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product\Product::class, 5)->create()->each(function($product){
        	factory(\App\Product\Inventory::class)->create(['product_id' => $product->id]);
        	factory(\App\Product\Price::class)->create(['product_id' => $product->id]);
        });
    }
}
