<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
