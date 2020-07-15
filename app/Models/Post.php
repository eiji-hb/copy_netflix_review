<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
  public function video()
  {
    return $this->belongsTo('App\Models\Video');
  }
}