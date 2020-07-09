<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'position',
    ];

    public function themes()
    {
        return $this->belongsToMany('App\Themes');
    }
}
