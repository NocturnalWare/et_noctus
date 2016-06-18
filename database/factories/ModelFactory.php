<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product\Product::class, function (Faker\Generator $faker) {
    return [
            'sort_order' => '11',
            'name' => 'Testing',
            'description' => 'Test',
            'category' => 'Tee',
            'display_price_min' => rand(10, 29).'.99',
            'display_price_max' => rand(10, 34).'.99',
            'paypal' => rand(0, 1),
            'active' => rand(0, 1),
            'onsale' => rand(0, 1),
            'upcomming' => rand(0, 1),
            'preorder' => rand(0, 1),
    ];
});
