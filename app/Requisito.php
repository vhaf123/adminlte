<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $fillable = [
        'curso_id', 'name'
    ];
}
