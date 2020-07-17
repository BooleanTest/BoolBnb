<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
      'title' => $faker -> name(),
      'rooms' => $faker -> randomDigit(),
      'bathrooms' => $faker -> randomDigit(),
      'meters' => $faker -> randomDigit(),
      'address' => $faker -> address(),
      'nation' => $faker -> state(),
      'city' => $faker -> city(),
      'number' => $faker -> randomDigit(),
      'latitude' => $faker -> randomFloat($nbMaxDecimal=5, $min=44.3, $max=46),
      'longitude' => $faker -> randomFloat($nbMaxDecimal=5, $min=10, $max=12),
      'image' => $faker -> imageUrl($width = 640, $height = 480),
      "time" => $faker -> numberBetween(1, 50),
      "view" => $faker -> randomDigit()
    ];
});
