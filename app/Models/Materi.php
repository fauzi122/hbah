<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
  protected $table = 'materis';

  public function getUser()
  {
  	return $this->belongsTo('App\Models\User', 'id_user');
  }
}
