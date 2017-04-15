<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
class UserPasswordUpdateRequest extends Request
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
        $password = Auth::user()->password;
        return [
          'current_password' => 'required|min:6|hash:' . $password,
          'new_password' => 'required|min:6|confirmed',
        ];
    }
}
