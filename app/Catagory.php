<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $fillable = [
        'catagory',
    ];

    public function getRouteKeyName()
    {
        return 'catagory';
    }

    public function themes()
    {
        return $this->hasMany('App\Theme');
    }
}
