<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['page_id', 'question_number'];
    
    public function testPage(){
  		return $this->belongsTo('App\TestPage');
  	}
    public function answers(){
      return $this->hasMany('App\Answer');
    }
}
