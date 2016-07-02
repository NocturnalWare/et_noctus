<?php

use Illuminate\Database\Seeder;

class PromotionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Promotions\Promotion::class, 15)->create()->each(function($promo) {
        	factory(App\Promotions\PromotionCode::class, 40)->create(['promotion_id' => $promo->id]);
    	});
    }
}
