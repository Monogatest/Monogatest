<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Models\User;
use App\jobs\UploadImage;
class UserController extends Controller
{

    public function get(User $user){
        return view('users.user', [
                'user' => $user,
            ]);
    }

    public function edit(User $user){
      $this->authorize('edit', $user);
      return view('users.edit.user', [
              'user' => $user,
          ]);
    }

    public function update(UserUpdateRequest $request, User $user){
      $this->authorize('update', $user);
      $user->update([
        'username' => $request->username,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'bio' => $request->bio,
      ]);
      $user->social()->update([
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'snapchat' => $request->snapchat,
        'twitter' => $request->twitter,
      ]);

      if($request->file('avatar')){
        $request->file('avatar')->move(storage_path() . '/uploads', $fileId = uniqid(true));
        $this->dispatch(new UploadImage($user, $fileId));
      }

      Session::flash('edited', 'You have <strong>Successfully</strong> updated your profile');
      return Redirect::to("/user/{$user->username}/edit");
    }

    public function getEditUserPrivacy(User $user){
      if(!Auth::user()->username == $user->username){
        return Redirect::route('getUser', ['username' => $user->username]);
      }
      return view('users.edit.privacy', [
              'user' => $user,
          ]);
    }

    public function getEditUserContact(User $user){
      if(!Auth::user()->username == $user->username){
        return Redirect::route('getUser', ['username' => $user->username]);
      }
      return view('users.edit.contact', [
              'user' => $user,
          ]);
    }

    public function editPassword(User $user){
      $this->authorize('edit', $user);
      return view('users.edit.password', [
              'user' => $user,
          ]);
    }

    public function updatePassword(UserPasswordUpdateRequest $request, User $user){
      $this->authorize('update', $user);
      // if(Hash::check($request->current_password, $user->password))
      // {
      //   $user->update(['password'=>Hash::make($request->new_password)]);
      // }
      // else
      // {
      //   $validator->errors() = array('current_password' => 'Please enter correct current password');
      //   dd($validator->errors()->has('current_password'));
      //   return Redirect::back()->withErrors(['errors'=> $validator->errors()]);
      // }
      $user->update(['password'=>Hash::make($request->new_password)]);

      return view('users.edit.password', [
              'user' => $user,
          ]);
    }

    public function updatePrivacy(Request $request, User $user){
      $this->authorize('edit', $user);
      $user->private = 0;
      if(isset($request['private'])){
        $user->private = 1;
      }
      $user->update();
      Session::flash('edited', 'You have <strong>Successfully</strong> updated your profile');
      return Redirect::back();
    }


}
