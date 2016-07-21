<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPage extends Model
{
	public function test(){
		return $this->belongsTo('App\Test');
  	}
}
