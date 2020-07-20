<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
      'text' => $faker -> sentence(),
      'mail' => $faker -> email(),
      'created_at' => $faker-> dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
    ];
});
