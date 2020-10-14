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
    
    public static $rules = array(
      'start_time' => 'required',
      'end_time' => 'required|after:start_time',
      'schedule_text' => 'required|max:30',
    );
}
