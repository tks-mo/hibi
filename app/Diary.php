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
      'image_path' => 'required_without:diary_text|file|image',
      'diary_text' => 'required_without:image_path|max:255',
      );
}
