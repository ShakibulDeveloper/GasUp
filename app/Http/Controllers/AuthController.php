<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class AuthController extends Controller
{

     public function new_register(Request $request)
    {

        $request->validate([
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:8|confirmed',
          'password_confirmation' => 'required',
      ]);


        $user  = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'Admin';
        $user->first_name = null;
        $user->last_name = null;
        $user->father_name = null;
        $user->mother_name = null;
        $user->mobile_number = null;
        $user->city = null;
        $user->gender = null;
        $user->dob = null;
        $user->date_joining = null;
        $user->marital_status = null;
        $user->photo = null;
        $user->passport_front = null;
        $user->passport_back = null;
        $user->address = null;
        $user->permanent_address = null;
        $user->work_experience = null;
        $user->descriptions = null;
        $user->validate = false;
        $user->marge_validation = 0;

        $user->save();

        return redirect()->route('login');
    }

    //END
}
