<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {

  $tipoRandom = array_rand(["x","y","z"],1);
  $name = ["basic", "premium", "deluxe"];
  $price = ["2.99","5.99","9.99"];
  $duration = ["30","60","90"];

    return [
      "name" => $name[$tipoRandom],
      "price" => $price[$tipoRandom],
      "duration" => $duration[$tipoRandom],
    ];

});
