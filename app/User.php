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
        'name', 'email', 'password','role_id','is_active','photo_id', 'mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


//relationship definition
    public function role() {
            return $this->belongsTo('App\Role');

    }

    public function photo() {
            return $this->belongsTo('App\Photo');

    }

    // public function is_Admin() {
            

    //         if($this->role->name == "admin"
                    
    //             && $this->role->is_active == 1){

    //             return true;

    //         }


    //         return false ;

    // }

}
