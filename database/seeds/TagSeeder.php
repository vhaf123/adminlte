<?php

use Illuminate\Database\Seeder;
use App\Tag;

use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();


        foreach ($tags as $tag) {
            
            $slug = Str::slug($tag->name, '-');

            $tag->update([
                'slug' => $slug
            ]);

        }

    }
}
