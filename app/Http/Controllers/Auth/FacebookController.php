<?php


namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;


class FacebookController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();
            $create['user_type'] = 'Admin';
            $create['first_name'] = null;
            $create['last_name'] = null;
            $create['father_name'] = null;
            $create['mother_name'] = null;
            $create['mobile_number'] = null;
            $create['city'] = null;
            $create['gender'] = null;
            $create['dob'] = null;
            $create['date_joining'] = null;
            $create['marital_status'] = null;
            $create['photo'] = null;
            $create['passport_front'] = null;
            $create['passport_back'] = null;
            $create['address'] = null;
            $create['permanent_address'] = null;
            $create['work_experience'] = null;
            $create['descriptions'] = null;
            $create['validate'] = false;
            $create['marge_validation'] = 0;


            $userModel = new User;
            $createdUser = $userModel->addNew($create);

        $user  = User::where('_id', $createdUser->id)->first();
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

            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
}
