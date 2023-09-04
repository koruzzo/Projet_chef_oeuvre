<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Point;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $posts = Post::all();

        foreach ($posts as $post) {
            foreach ($users as $user) {
                Comment::factory(5)->create([
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                ]);
            }
        }
    }
}
