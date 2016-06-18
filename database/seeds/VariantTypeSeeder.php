<?php

use Illuminate\Database\Seeder;

class VariantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Product\VariantType::create(['variant_type' => 'size']);
        App\Product\VariantType::create(['variant_type' => 'show']);
        App\Product\VariantType::create(['variant_type' => 'trinket']);
        App\Product\VariantType::create(['variant_type' => 'promo']);
    }
}
