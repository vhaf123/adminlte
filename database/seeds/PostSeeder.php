<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 50)->create()->each(function(Post $post){

            $post->update([
                'picture' => 'img/blog/post/' . $post->id . ".jpg"
            ]);

            $post->tags()->attach(\App\Tag::all()->random()->id);
            
        });
    }
}
