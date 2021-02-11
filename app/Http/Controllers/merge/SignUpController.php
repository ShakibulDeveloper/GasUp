<?php

namespace App\Http\Controllers\merge;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\merge\SignUp;
use App\User;
use Auth;

class SignUpController extends Controller
{
  // Signup insert function
  function signup (Request $request)
  {
    $request->validate([
      'username' => 'required',
      'email' => 'required|email',
      'phone' => 'required|numeric',
      'address' => 'required',
      'password' => 'required',
    ]);

    SignUp::insert([
      'username' => $request->username,
      'email' => $request->email,
      'phone' => $request->phone,
      'address' => $request->address,
      'password' => $request->password,
    ]);

    User::where('email',Auth::user()->email)->update([
      'marge_validation' => 1,
    ]);
    return redirect('/new_order');
  }
}
