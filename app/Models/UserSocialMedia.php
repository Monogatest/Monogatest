<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model
{
  protected $fillable = [
      'user_id', 'facebook', 'instagram', 'snapchat', 'twitter',
  ];

  public function user(){
    return $this->belongsTo('App\Models\User');
  }
}
