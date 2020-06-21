<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'theme', 'catagory_id',
    ];

    public function types()
    {
        return $this->hasMany('App\Type');
    }
}
