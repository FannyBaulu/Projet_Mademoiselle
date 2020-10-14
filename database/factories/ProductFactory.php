<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'refNumber' => $faker->unique()->randomNumber($nbDigits=8),
        'description'=>$faker->paragraph,
        'image'=>'https://picsum.photos/640/480',
        'category_id' => $faker->numberBetween($min=1,$max=6),
        'price' => $faker->numberBetween($min = 100, $max = 1500),
    ];
});
