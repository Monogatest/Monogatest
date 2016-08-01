<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPage extends Model
{
    protected $fillable = ['test_id', 'image', 'content'];
	public function test(){
		return $this->belongsTo('App\Test');
  	}
}
