<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profesor;
use App\Blogger;
use App\Creador;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Administrador */
        $user = User::create([
                    'name' => 'Victor Arana',
                    'email' => 'victor.aranaf92@gmail.com',
                    'password' => bcrypt('12345678')
                ]);

        $user->roles()->attach(1);
        
        Profesor::create([
            'user_id' => $user->id
        ]);

        Blogger::create([
            'user_id' => $user->id
        ]);

        Creador::create([
            'user_id' => $user->id
        ]);


        /* factory(User::class, 10)->create()->each(function(User $user){

            $user->update([
                'picture' => 'img/users/' . $user->id . ".jpg"
            ]);

            $user->roles()->attach(2);

            Profesor::create([
                'user_id' => $user->id
            ]);

        });

        factory(User::class, 10)->create()->each(function(User $user){

            $user->update([
                'picture' => 'img/users/' . $user->id . ".jpg"
            ]);

            $user->roles()->attach(3);

            Blogger::create([
                'user_id' => $user->id
            ]);

        });

        factory(User::class, 10)->create()->each(function(User $user){

            $user->update([
                'picture' => 'img/users/' . $user->id . ".jpg"
            ]);

            $user->roles()->attach(4);

            Creador::create([
                'user_id' => $user->id
            ]);

        });

        factory(User::class, 40)->create()->each(function(User $user){
            $user->update([
                'picture' => 'img/users/' . $user->id . ".jpg"
            ]);
        }); */
    }
}
