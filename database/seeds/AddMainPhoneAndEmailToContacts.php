<?php

use Illuminate\Database\Seeder;

class AddMainPhoneAndEmailToContacts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Contacts\Contact::all() as $contact){
        	$phone = \App\Contacts\Phone::inRandomOrder()->first();
        	$email = \App\Contacts\Email::inRandomOrder()->first();

        	$contact->main_phone_id = $phone->id;
        	$contact->main_email_id = $email->id;
        	$contact->save();
        }
    }
}
