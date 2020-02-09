<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TradeRequest;
use Faker\Generator as Faker;

$factory->define(TradeRequest::class, function (Faker $faker) {
    return [
        'customer' => $faker->name,
        'comment' => $faker->state,
        'tradeType' => TradeRequest::TRADE_TYPE_DEMAND,
        'state' => TradeRequest::STATE_ON_GOING,
    ];
});
