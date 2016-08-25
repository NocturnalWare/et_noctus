<?php

use Illuminate\Database\Seeder;

class ShowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Shows\Venue::class, 5)->create()->each(function($venue) {
        	factory(App\Shows\Show::class, 1)->create(['venue_id' => $venue->id, 'main_contact_id' => 1]);
    	});
    }
}
