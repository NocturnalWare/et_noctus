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
            'name' => $faker->randomElement($array = [
                'Native Owl Tank',
                'Hunter Tee',
                'Mank Beast',
                'Cat Skull Panties',
                'Devaux',
                'Darby Skull Leggings',
                'Overload Tank',
                'Geo-Owl Tank',
                'Galaxy Tank',
                'Zodiac Tee',
            ]),
            'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
            'category' => 'Tee',
            'display_price_min' => rand(10, 29).'.99',
            'display_price_max' => rand(10, 34).'.99',
            'paypal' => rand(0, 1),
            'active' => rand(0, 1),
            'onsale' => rand(0, 1),
            'upcomming' => rand(0, 1),
            'preorder' => rand(0, 1),
            'onesize' => rand(0, 1),
    ];
});

$factory->define(App\Product\Price::class, function (Faker\Generator $faker) {
    return [
        'xsmall' => $faker->randomFloat(2, '1299', '4999'),
        'small' => $faker->randomFloat(2, '1299', '4999'),
        'medium' => $faker->randomFloat(2, '1299', '4999'),
        'large' => $faker->randomFloat(2, '1299', '4999'),
        'xlarge' => $faker->randomFloat(2, '1299', '4999'),
        'xxlarge' => $faker->randomFloat(2, '1299', '4999'),
        'xxxlarge' => $faker->randomFloat(2, '1299', '4999'),
        'onesize' => $faker->randomFloat(2, '1299', '4999'),
    ];
});

$factory->define(App\Product\Inventory::class, function (Faker\Generator $faker) {
    return [
        'xsmall' => rand(0, 50),
        'small' => rand(0, 50),
        'medium' => rand(0, 50),
        'large' => rand(0, 50),
        'xlarge' => rand(0, 50),
        'xxlarge' => rand(0, 50),
        'xxxlarge' => rand(0, 50),
        'onesize' => rand(0, 50),
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

$factory->define(App\Contacts\Contact::class, function (Faker\Generator $faker) {
    return [
        'f_name' => $faker->firstName,
        'l_name' => $faker->lastName,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'linkedin' => $faker->url,
        'instagram' => $faker->url,
        'snapchat' => $faker->url,
        'website' => $faker->url,
        'notes' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});

$factory->define(App\Contacts\Email::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'label' => $faker->bs,
    ];
});

$factory->define(App\Contacts\Phone::class, function (Faker\Generator $faker) {
    return [
        'number' => $faker->phoneNumber,
        'label' => $faker->bs,
    ];
});

$factory->define(App\Shows\Venue::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->bs,
        'address1' => "$faker->buildingNumber.' '.$faker->streetName",
        'address2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'capacity' => $faker->numberBetween($min = 200, $max = 2000),
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'instagram' => $faker->url,
        'yelp' => $faker->url,
        'website' => $faker->url,
        'notes' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});

$factory->define(App\Shows\Show::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->catchPhrase,
        'main_image' => $faker->url,
        'facebook' => $faker->url,
        'ticket' => $faker->url,
        'website' => $faker->url,
        'event_date' => $faker->dateTimeThisYear($max = '+1 years'),
        'message' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});

$factory->define(App\Shows\ShowBand::class, function (Faker\Generator $faker) {
    return [
        'ticket_sales' => $faker->url,
    ];
});

$factory->define(App\Bands\Band::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'instagram' => $faker->url,
        'snapchat' => $faker->url,
        'website' => $faker->url,
        'notes' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});

$factory->define(App\Bands\BandMember::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Bands\BandMemberInstrument::class, function (Faker\Generator $faker) {
    return [
        'instrument' => $faker->randomElement($array = [
            'Vocals (heavy)',
            'Vocals (clean)',
            'Rhythm Guitar',
            'Lead Guitar',
            'Bass Guitar',
            'Drums',
            'Harmonica',
            'Keyboard',
            'Trumpet',
            'Piano',
            'Violin',
        ]),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});

$factory->define(App\Bands\BandMemberPrevious::class, function (Faker\Generator $faker) {
    return [
    ];
});
