<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'profile', 'dmd', 'team_id', 'position_id', 'role_id', 'email', 'password',
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

    public function teams()
    {
        return $this->belongsToMany('App\Team', 'coaches');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function position()
    {
        return $this->hasOne('App\Position', 'id', 'position_id');
    }

    public function setPasswordAttribute($pass){
        $this->attributes['password'] = Hash::make($pass);
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles) ){
            foreach($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('role', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasNoRole()
    {
        if($this->roles()->get()->isEmpty()) {
            return true;
        }
        return false;
    }

}
