<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');
    
    public function day()
    {
      return $this->hasOne('App\Day');
    }
    
}
