<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'blogger_id', 'name', 'picture', 'extracto', 'keywords', 'body', 'status', 'slug', 'contador'
    ];

    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }


    /* Relación uno a muchos inversa */
    public function blogger()
    {
        return $this->belongsTo('App\Blogger');
    }

    /*Relación muchos a muchos*/

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
