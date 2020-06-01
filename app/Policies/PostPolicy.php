<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function redactado(User $user, Post $post){
        if($post->blogger_id == $user->blogger->id){
            return true;
        }else{
            return false;
        }
    }
}
