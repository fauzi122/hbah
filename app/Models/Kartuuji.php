<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kartuuji extends Model
{
    protected $fillable = [
        'no_induk',
        'nama',
        'kls',
        'status'
    ];
}
