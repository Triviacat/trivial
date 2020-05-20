<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'private' => '1',
        'chat' => $faker->url,
        'password' => $faker->word(25),
        'invited' => [],
        'players' => []
    ];
});
