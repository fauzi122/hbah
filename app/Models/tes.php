<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tes extends Model
{
    protected $table = "tes";
 
    protected $fillable = ['nama','nis','alamat','email','password'];
}
