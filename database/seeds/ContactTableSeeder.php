<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Contacts\Contact::class, 15)->create()->each(function($contact) {
            factory(App\Contacts\Email::class, 3)->create(['contact_id' => $contact->id]);
            factory(App\Contacts\Phone::class, 3)->create(['contact_id' => $contact->id]);
        });
    }
}
