<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');
    
    public function day()
    {
      return $this->belongsTo('App\Day');
    }
    
    public static $rules = array(
      'image_path' => 'file|image',
      'diary_text' => 'required|max:255',
      );
}
