<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    //hasMany ke table atau Model Post
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}