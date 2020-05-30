<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* Relación uno a uno */
    public function profesor()
    {
        return $this->hasOne('App\Profesor');
    }

    public function blogger()
    {
        return $this->hasOne('App\Blogger');
    }

    public function creador()
    {
        return $this->hasOne('App\Creador');
    }


    /* Relación uno a muchos */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }


    /*Relación muchos a muchos*/

    public function roles()
    {
        return $this->belongsToMany('Caffeinated\Shinobi\Models\Role');
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Curso');
    }

    public function videos()
    {
        return $this->belongsToMany('App\Video');
    }
}
