<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $posts = Post::all();

        if ($users->isEmpty() || $posts->isEmpty()) {
            return;
        }

        foreach ($posts as $post) {
            $commentCount = rand(1, 5);
            for ($i = 0; $i < $commentCount; $i++) {
                Comment::create([
                    'content' => fake()->paragraph(),
                    'user_id' => $users->random()->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
