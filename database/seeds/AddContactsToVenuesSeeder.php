<?php

use Illuminate\Database\Seeder;

class AddContactsToVenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Venues\Venue::all() as $venue){
        	$contact = \App\Contacts\Contact::inRandomOrder()->first();
        	$venue->main_contact_id = $contact->id;
        	$venue->save();
        }
    }
}
