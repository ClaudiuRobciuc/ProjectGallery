<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(App\PaintingModel::class, function (Faker $faker) {
    return [
        'refference_id' => randomString(),
        'author' => $this->faker->name,
        'title' => $this->faker->word,
        'description' => $this->faker->text,
        'type' => 1,
        'price' => $this->faker->numberBetween(100,2000),
    ];
});
