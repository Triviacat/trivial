<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Turn;
use Faker\Generator as Faker;

$factory->define(Turn::class, function (Faker $faker) {
    return [
        'game_id' => '',
        'user_id' => '',
        'step' => 'dice',
        'box_id' => 1
    ];
});
