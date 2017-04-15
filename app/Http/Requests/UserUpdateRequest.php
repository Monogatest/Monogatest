<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
class UserUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $userId = Auth::user()->id;
        return [
          'username' => 'required|max:30|alpha_dash|unique:users,username,'.$userId,
          'first_name' => 'required|max:255',
          'last_name' => 'required|max:255',
          'gender' => 'required',
          'avatar' => 'max:255',
          'bio' => 'max:1000',
          'facebook' => 'max:255',
          'twitter' => 'max:255',
          'instagram' => 'max:255',
        ];
    }
}
