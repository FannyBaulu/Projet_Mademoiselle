<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\News;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'description'=>$faker->paragraph,
        'image'=>'https://picsum.photos/640/480',
        'news_category_id' => $faker->numberBetween($min=1,$max=5),
    ];
});
