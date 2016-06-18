<?php

use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'xsmall']);
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'small']);
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'medium']);
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'large']);
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'xlarge']);
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'xxlarge']);
        App\Product\Variant::create(['type_id' => '1', 'variant' => 'xxxlarge']);
        App\Product\Variant::create(['type_id' => '2', 'variant' => 'presale']);
        App\Product\Variant::create(['type_id' => '2', 'variant' => 'door']);
        App\Product\Variant::create(['type_id' => '3', 'variant' => 'normal']);
        App\Product\Variant::create(['type_id' => '3', 'variant' => 'tempsense']);
        App\Product\Variant::create(['type_id' => '3', 'variant' => 'lightsense']);
    }
}
