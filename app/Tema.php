<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = ['capitulo_id', 'name', 'body'];

    public function capitulo()
    {
        return $this->belongsTo('App\Capitulo');
    }


    //Relacion polimorfica

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    
}
