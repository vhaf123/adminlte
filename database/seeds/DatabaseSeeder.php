<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(CursoSeeder::class);

        $this->call(TagSeeder::class);
        $this->call(PostSeeder::class);

        $this->call(ManualSeeder::class);
    }
}
