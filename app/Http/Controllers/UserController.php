<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\User;
use Auth;
use Session;
class UserController extends Controller
{

    public function getUser($username){
        $user = User::whereUsername($username)->first();
        return view('users.user', [
                'user' => $user,
            ]);
    }

    public function getEditUser($username){
      if(!Auth::check()){
        return Redirect::route('getUser', ['username' => $username]);
      }
      if(!Auth::user()->username == $username){
        return Redirect::route('getUser', ['username' => $username]);
      }
      $user = User::whereUsername($username)->first();
      return view('users.edit-user', [
              'user' => $user,
          ]);
    }

    public function getEditUserPrivacy($username){
      if(!Auth::check()){
        return Redirect::route('getUser', ['username' => $username]);
      }
      if(!Auth::user()->username == $username){
        return Redirect::route('getUser', ['username' => $username]);
      }
      $user = User::whereUsername($username)->first();
      return view('users.edit-user_privacy_settings', [
              'user' => $user,
          ]);
    }

    public function getEditUserContact($username){
      if(!Auth::check()){
        return Redirect::route('getUser', ['username' => $username]);
      }
      if(!Auth::user()->username == $username){
        return Redirect::route('getUser', ['username' => $username]);
      }
      $user = User::whereUsername($username)->first();
      return view('users.edit-user_contact_settings', [
              'user' => $user,
          ]);
    }

    public function getEditUserPassword($username){
      if(!Auth::check()){
        return Redirect::route('getUser', ['username' => $username]);
      }
      if(!Auth::user()->username == $username){
        return Redirect::route('getUser', ['username' => $username]);
      }
      $user = User::whereUsername($username)->first();
      return view('users.edit-user_change_password', [
              'user' => $user,
          ]);
    }

    public function postEditUser(Request $request){

      if(!Auth::check()){
        return Redirect::route('getUser', ['username' => $username]);
      }
      if(!Auth::user()->username == $request['username']){
        return Redirect::route('getUser', ['username' => $username]);
      }
      $this->validate($request,[
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'gender' => 'required',
        'avatar' => 'max:255',
        'bio' => 'max:1000',
        'facebook' => 'max:255',
        'twitter' => 'max:255',
        'instagram' => 'max:255',
      ]);
      $user = User::whereUsername($request['username'])->first();
      $user->first_name = $request['first_name'];
      $user->last_name = $request['last_name'];
      $user->gender = $request['gender'];
      $user->avatar = $request['avatar'];
      $user->bio = $request['bio'];
      $user->facebook = $request['facebook'];
      $user->twitter = $request['twitter'];
      $user->instagram = $request['instagram'];
      $user->update();
      Session::flash('edited', 'You have <strong>Successfully</strong> updated your profile');
      return Redirect::back();
    }

    public function postEditUserPrivacy(Request $request){

      if(!Auth::check()){
        return Redirect::route('getUser', ['username' => $username]);
      }
      if(!Auth::user()->username == $request['username']){
        return Redirect::route('getUser', ['username' => $username]);
      }

      $user = User::whereUsername($request['username'])->first();
      $user->private = 0;
      if(isset($request['private'])){
        $user->private = 1;
      }
      $user->update();
      Session::flash('edited', 'You have <strong>Successfully</strong> updated your profile');
      return Redirect::back();
    }


}
