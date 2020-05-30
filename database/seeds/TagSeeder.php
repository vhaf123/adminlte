<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Actualidad'
        ]);

        Tag::create([
            'name' => 'Tecnología'
        ]);

        Tag::create([
            'name' => 'Diseño'
        ]);

        Tag::create([
            'name' => 'Programación'
        ]);

        Tag::create([
            'name' => 'Informática'
        ]);
    }
}
