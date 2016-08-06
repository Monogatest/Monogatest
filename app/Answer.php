<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'status', 'value'];
    public function question(){
  		return $this->belongsTo('App\Question');
  	}
}
