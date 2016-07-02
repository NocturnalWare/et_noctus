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

$factory->define(App\Promotions\Promotion::class, function (Faker\Generator $faker) {
    return [
            'promotion_name' => $faker->catchPhrase,
            'price_percent' => $faker->randomFloat(2, '0.05', '0.20'),
            'price_flat' => $faker->randomFloat(2, '2.50', '15.00'),
    ];
});

$factory->define(App\Promotions\PromotionCode::class, function (Faker\Generator $faker) {
    return [
            'code' => str_random(10),
            'email' => $faker->safeEmail,
            'owner' => $faker->name,
            'used' => rand(0, 1),
            'expires' => $faker->dateTimeInInterval($startDate = '-5 days', $interval = '+ 90 days', $timezone = date_default_timezone_get()),
    ];
});
