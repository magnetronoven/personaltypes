<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'coaches');
    }

    public function players() 
    {
        return $this->hasMany('App\User');
    }
}
