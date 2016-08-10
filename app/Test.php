<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['user_id', 'title', 'reference_name', 'reference_url', 'poster', 'published'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function testPages(){
      return $this->hasMany('App\TestPage');
    }

    public function test_users(){
      return $this->belongsToMany('App\User')->withPivot('id', 'score')->withTimestamps();
    }
}
