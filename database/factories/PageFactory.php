<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Page::class, function (Faker $faker) {

    $title = $faker->sentence(mt_rand(3, 8));
    $slug = Str::slug($title, '-');

    $body = '';

    $n = mt_rand(4, 8);

    for($i = 0; $i < $n; $i++) {
        $body .= '<p>'. $faker->sentence(mt_rand(50, 80)) .'</p>';
    }

    return [
        'title' => $title,
        'slug' => $slug,
        'subtitle' => mt_rand(0,1) == 1 ? $faker->sentence(mt_rand(10, 15)) : '',
        'body' => $body,
        'active' => mt_rand(0, 3) > 0
    ];
});
