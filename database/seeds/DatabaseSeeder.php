<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductTableSeeder::class);
        $this->call(VariantTypeSeeder::class);
        $this->call(VariantSeeder::class);
        $this->call(ProductVariantSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
    }
}
