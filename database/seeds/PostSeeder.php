<?php

use Illuminate\Database\Seeder;
use App\Post;

use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $post->update([
                'title' => $post->name,
                'description' => $post->extracto
            ]);
        }
    }
}
