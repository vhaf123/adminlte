<?php

namespace App\Http\Middleware;
use App\Post;

use Closure;

class PostPublicado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, Post $post)
    {

        if($post->status == 1){
            abort(403, 'This action is unauthorized.');
        }

        return $next($request);
    }
}
