<?php

use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach(\App\Product\Product::all() as $product){
    		foreach (range(1, 5) as $range){
		        foreach(\App\Product\Variant::where('id', $range)->get() as $size){
		        	\App\Product\ProductVariant::create(['product_id' => $product->id, 'variant_id' => $size->id, 'price' => rand(14, 39).'99']);
		        }
    		}
    	}
    }
}
