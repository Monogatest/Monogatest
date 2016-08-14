<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class UserController extends Controller
{

    public function getUser($username){
        $user = User::whereUsername($username)->first();
        return view('users.user', [
                'user' => $user,
            ]);
    }
}
