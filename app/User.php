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

    protected $withCount = ['roles'];

    //Route Model Binding
    public function getRouteKeyName()
    {
        return 'slug';
    }


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

    /* Atributos */
    public function getRolAttribute(){

        $roles = "";

        if($this->roles_count){
            
            foreach ($this->roles as $role) {
                $roles = $roles . $role->name . ", " ;
            }

            return substr($roles, 0, -2);

        }else{
            return "No tiene ningún rol";
        }
        
    }


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

    public function social_accounts()
    {
        return $this->hasMany('App\SocialAccount');
    }

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
