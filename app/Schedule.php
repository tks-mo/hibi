<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = array('id');
    
    public function day()
    {
      return $this->belongsTo('App\Day');
    }
}
