<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\View;
use Faker\Generator as Faker;

$factory->define(View::class, function (Faker $faker) {
    return [
      'ip' => $faker->localIpv4(),
      'created_at' => $faker-> dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
    ];
});
