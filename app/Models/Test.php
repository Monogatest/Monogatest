<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['user_id', 'title', 'reference_name', 'reference_url', 'poster', 'published'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function testPages(){
      return $this->hasMany('App\Models\TestPage');
    }

    public function test_users(){
      return $this->belongsToMany('App\Models\User')->withPivot('id', 'score')->withTimestamps();
    }
}
