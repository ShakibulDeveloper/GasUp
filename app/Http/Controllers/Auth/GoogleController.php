<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect()->route('home');
     
            }else{

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('12345678'),
                    'user_type' => "Admin",
                    'first_name' => null,
                    'last_name' => null,
                    'father_name' => null,
                    'mother_name' => null,
                    'mobile_number' => null,
                    'city' => null,
                    'gender' => null,
                    'dob' => null,
                    'date_joining' => null,
                    'marital_status' => null,
                    'photo' => null,
                    'passport_front' => null,
                    'passport_back' => null,
                    'address' => null,
                    'permanent_address' => null,
                    'work_experience' => null,
                    'descriptions' => null,
                    'validate' => false,
                    'marge_validation' => 0
                ]);
    
                Auth::login($newUser);
     
                return redirect()->route('home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}