<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
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


$factory->define(Post::class, function (Faker $faker) {

    $name = $faker->sentence(mt_rand(1, 3));
    $slug = Str::slug($name, '-');

    $content = '';

    $n = mt_rand(4, 8);

    for($i = 0; $i < $n; $i++) {
        $content .= '<p>'. $faker->sentence(mt_rand(50, 80)) .'</p>';
    }

    return [
        'title' => $name,
        'slug' => $slug,
        'content' => $content,
        'active' => mt_rand(0, 3) > 0
    ];
});
