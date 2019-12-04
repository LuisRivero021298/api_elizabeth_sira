<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function role()
    {
        return $this->hasOne('elizabethSira\Role','id_role');
    }

    public function authorizeRoles($role){
        if($role != null){
            if($this->hasRole($role)){
                return true;//se debe cambiar por una respuesta REST
            }
        }else{
            return false;
        }
    }

    public function hasRole($role){ //valida si un usuario tiene un rol
        if($this->role()->where('name_role',$role)->first()){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_role'
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
}
