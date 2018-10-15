<?php

use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create random users and posts
        factory(App\Models\User::class, rand(25, 35))->create()->each(function ($user) {
            factory(App\Models\Post::class, rand(11, 21))->create(
                [
                    'user_id' => $user->id,
                ]
            );
        });

        // Create random users comments in all posts
        App\Models\Post::get()->each(function ($post) {
            App\Models\User::inRandomOrder()->take(rand(15, 25))->get()->each(function($user) use ($post) {
                factory(App\Models\Comment::class, 1)->create(
                    [
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                    ]
                );
            });
        });
    }
}
