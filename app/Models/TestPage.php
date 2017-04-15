<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPage extends Model
{
    protected $fillable = ['test_id', 'image', 'content'];
  	public function test(){
  		return $this->belongsTo('App\Models\Test');
  	}
    public function questions(){
      return $this->hasMany('App\Models\Question');
    }
}
