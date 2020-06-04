<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{

    protected $fillable = [
        'user_id', 'social_id', 'social', 'avatar'
    ];

    /* Relación uno a uno inversa */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
