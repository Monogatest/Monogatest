<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'private', 'email', 'password', 'username', 'avatar', 'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName(){
      return 'username';
    }

    public function tests(){
      return $this->hasMany('App\Models\Test');
    }

    public function tests_taken(){
      return $this->belongsToMany('App\Models\Test')->withPivot('id', 'score')->withTimestamps();
    }
    
    public function social(){
      return $this->hasOne('App\Models\UserSocialMedia');
    }
}
