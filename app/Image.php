<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = [
        'picture', 'imageable_id', 'imageable_type'
    ];
    
    /* Relacion polimorfica*/
    public function imageable()
    {
        return $this->morphTo();
    }
}
