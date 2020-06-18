<?php

use Illuminate\Database\Seeder;

use App\Video;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = Video::all();

        foreach ($videos as $video) {
            $slug = Str::slug($video->name, '-');

            while (Video::where('slug', $slug)->count()) {
                $slug = $slug.rand(1,100);
            }

            $video->update([
                'slug' => $slug
            ]);
        }
    }
}
