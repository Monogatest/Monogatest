<?php

namespace App\Policies;

use App\Models\User;
use Auth;
// use App\Http\Requests\UserUpdateRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, User $request){
      return $user->username === $request->username;
    }

    public function edit(User $user, User $request){
      return $user->username === $request->username;
    }

}
