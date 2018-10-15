<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker, $data) {
    return [
        'user_id' => $data['user_id'],
        'post_id' => $data['post_id'],
        'value' => $faker->sentences(rand(1, 3), true) ,
    ];
});
