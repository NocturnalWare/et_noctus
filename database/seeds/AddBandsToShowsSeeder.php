<?php

use Illuminate\Database\Seeder;

class AddBandsToShowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add a main instrument for the band
    	foreach(\App\Bands\BandMember::all() as $member){
    		$member->main_instrument_id = \App\Bands\BandMemberInstrument::inRandomOrder()->first()->id;
    		$member->save();
    	}

    	//Add some bands to some shows
    	foreach(range(1,5) as $do){
	    	foreach(\App\Shows\Show::all() as $show){
	    		$band = \App\Bands\Band::inRandomOrder()->first();
	        	factory(App\Shows\ShowBand::class, 1)->create([
	        		'band_id' => $band->id,
	        		'band_contact_id' => $band->members->first()->id,
	        		'show_id' => $show->id
	        	]);
	    	}
    	}
    }
}
