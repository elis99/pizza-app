<?php
use App\Models\Pizza;
use Faker\Generator as Faker;

$factory->define(Pizza::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->sentence(),
        'price' => 100,
        'img_url' => $faker->url()
    ];
});
