<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = array('id');

    public function schedules()
    {
      return $this->hasMany('App\Schedule');
    }
    
    public function diary()
    {
      return $this->hasOne('App\Diary');
    }
    
}
