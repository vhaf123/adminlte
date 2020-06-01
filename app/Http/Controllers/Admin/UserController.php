<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Role;

use App\User;
use App\Profesor;
use App\Blogger;
use App\Creador;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
        $roles = $request->get('roles');

        if($roles){
            foreach ($roles as $role) {

                switch ($role) {
                    case 1:

                        if(!Profesor::where('user_id', $user->id)->count()){
                            Profesor::create(['user_id' => $user->id]);
                        }
    
                        if(!Blogger::where('user_id', $user->id)->count()){
                            Blogger::create(['user_id' => $user->id]);
                        }
    
                        if(!Creador::where('user_id', $user->id)->count()){
                            Creador::create(['user_id' => $user->id]);
                        }

                        
                        break;

                    case 2:

                        if(!Profesor::where('user_id', $user->id)->count()){
                            Profesor::create(['user_id' => $user->id]);
                        }

                        
                        break;

                    case 3:

                        if(!Blogger::where('user_id', $user->id)->count()){
                            Blogger::create(['user_id' => $user->id]);
                        }
                    
                        break;

                    case 4:

                        if(!Creador::where('user_id', $user->id)->count()){
                            Creador::create(['user_id' => $user->id]);
                        }
                    
                        break;        
                }

            }
        }

        $user->roles()->sync($roles);

        return back()->with('info', 'Asignado el rol con éxito');
    }
    
}
