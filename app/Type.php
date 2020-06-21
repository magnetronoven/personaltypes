<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'keywords', 'description', 'hyperlink', 'connected_mbti', 'theme_id',
    ];
}
