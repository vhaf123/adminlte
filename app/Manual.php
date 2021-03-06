<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    protected $table = 'manuales';

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'creador_id', 'categoria_id', 'name', 'title','descripcion', 'description','slug', 'picture', 'status'
    ];



    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relación uno a muchos
    public function capitulos()
    {
        return $this->hasMany('App\Capitulo');
    }


    /* Relación uno a muchos inversa */
    public function creador()
    {
        return $this->belongsTo('App\Creador');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    /* Relacion Has One Through */

    public function temas()
    {
        return $this->hasManyThrough('App\Tema', 'App\Capitulo');
    }
}
