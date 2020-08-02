<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /*Relación muchos a muchos*/

    protected $fillable = [
        'name', 'background'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
