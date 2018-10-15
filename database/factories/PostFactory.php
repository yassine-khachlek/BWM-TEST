<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker, $data) {
    return [
        'user_id' => $data['user_id'],
        'value' => $faker->paragraphs(rand(1, 5), true) ,
    ];
});
