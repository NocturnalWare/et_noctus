<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $count = 5;

    public function run()
    {
        factory(\App\Bands\Band::class, $this->count)->create()->each(function($band) {
        	foreach(range(1, 3) as $do){
        		$this->member($band);
        	}
    	});
    }

    public function member($band){
    	factory(App\Bands\BandMember::class, 1)->create(['contact_id' => App\Contacts\Contact::inRandomOrder()->first()->id, 'band_id' => $band->id])->each(function($member) {
    		factory(App\Bands\BandMemberInstrument::class, 1)->create(['contact_id' => $member->contact_id]);
    		factory(App\Bands\BandMemberPrevious::class, 2)->create(['contact_id' => $member->contact_id, 'band_id' => rand(1, $this->count)]);
    	});
    }
}
