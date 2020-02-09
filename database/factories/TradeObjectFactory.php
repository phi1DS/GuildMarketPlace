<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TradeObject;
use App\TradeRequest;
use Faker\Generator as Faker;

// Commands bash -----

// php artisan tinker
// factory(App\TradeObject::class, 1)->create();

$factory->define(TradeObject::class, function (Faker $faker) {
    return [
        'wowhead_id' => rand(1000, 6000),
        'trade_request_id' => factory(TradeRequest::class),
    ];
});
