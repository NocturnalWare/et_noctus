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
        $this->call(UserTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(ShowTableSeeder::class);
        $this->call(BandsTableSeeder::class); //RUN AFTER CONTACTS!
        $this->call(AddMainPhoneAndEmailToContacts::class); //RUN AFTER CONTACTS!
        $this->call(AddBandsToShowsSeeder::class); //RUN AFTER BANDS!
        $this->call(AddContactsToVenuesSeeder::class); //RUN AFTER CONTACTS & SHOWS!
    }
}
