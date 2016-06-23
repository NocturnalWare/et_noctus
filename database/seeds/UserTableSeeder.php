<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = array(
                [
                	'name' => 'Jason Putnam',
                    'email'       => 'owner@eternallynocturnal.com',
                    'password'    => \Hash::make('Password123'),
                ],	                
                [
                	'name' => 'Joe Tavares',
                    'email'       => 'joe@eternallynocturnal.com',
                    'password'    => \Hash::make('Password123'),
                ],
        );
        foreach ($accounts as $account) {
            $user = \App\User::create($account);
    	}
	}
}
