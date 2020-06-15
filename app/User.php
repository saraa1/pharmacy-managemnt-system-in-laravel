<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin(){

        if($this->role->name== 'admin' ){

            return true;
        }

        return false;
    }
    public function isCustomer(){

        if($this->role->name== 'customer' ){

            return true;
        }

        return false;
    }
    public function isStaff(){

        if($this->role->name== 'staff' && $this->is_active== 1 ){

            return true;
        }

        return false;
    }



    public function role(){

        return $this->belongsTo('App\Role');
    }
    public function image(){

        return $this->belongsTo('App\Image');
    }
}
