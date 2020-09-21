<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'date' => 'required',
        'diary_id' => 'required',
    );
    
    public function diary()
    {
      return $this->belongsTo('App\Diary');
    }
}
