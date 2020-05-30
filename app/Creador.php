<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creador extends Model
{
    protected $table = 'creadores';

    /* Relación uno a uno inversa */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /* Relación uno a muchos */
    public function manuales()
    {
        return $this->hasMany('App\Manual');
    }
}
