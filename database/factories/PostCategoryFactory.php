<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostCategory;
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

$factory->define(PostCategory::class, function (Faker $faker) {

    $name = $faker->sentence(mt_rand(1, 3));
    $slug = Str::slug($name, '-');

    return [
        'name' => $name,
        'slug' => $slug,
        'active' => mt_rand(0, 4) > 0
    ];
});
