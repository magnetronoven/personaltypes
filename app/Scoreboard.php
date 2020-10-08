<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    protected $table = 'scoreboard';
    //
    protected $fillable = [
        'home_name', 'opponent_name', 'home_points', 'opponent_points', 'home_sets', 'opponent_sets',
    ];
}
