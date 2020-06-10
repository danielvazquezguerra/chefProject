<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [

    'title', 'images','ingredients', 'method',' duration', 'level', 'serves', 'user_id'

    ];

    public function recipe()

    {
        return $this->hasOne('App\Recipe');

    }

    public function user(){

        return $this->belongsTo('App\User');
    }
    
    public function likes()
    {
       return $this->morphMany('\App\Like','likeable');
    }

}
