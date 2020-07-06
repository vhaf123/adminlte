<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'name', 'slug','descripcion'
    ];

    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
