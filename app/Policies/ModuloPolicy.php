<?php

namespace App\Policies;

use App\User;
use App\Modulo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModuloPolicy
{
    use HandlesAuthorization;

    public function dictado(User $user, Modulo $modulo){
        if($modulo->curso->profesor_id == $user->profesor->id){
            return true;
        }else{
            return false;
        }
    }
}
