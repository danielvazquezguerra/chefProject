<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function recipe()
    {
        return $this->hasOne('App\Recipe');
    }
}
