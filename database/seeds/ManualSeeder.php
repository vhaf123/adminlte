<?php

use Illuminate\Database\Seeder;

use App\Manual;


class ManualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manuales = Manual::all();

        foreach ($manuales as $manual) {
            $manual->update([
                'description' => $manual->descripcion
            ]);
        }
    }
}
