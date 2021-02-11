<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Image;
class ProfileController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }
    public function profile(){
    	$data['active']='profile';
    	$data['user']=auth()->user();
    	$data['roles']=DB::table('roles')->get();
    	return view('admin.profile.profile',$data);
    }
    public function editProfile(){
    	$data['active']='profile';
        $data['user']=auth()->user();
        $data['roles']=DB::table('roles')->get();
        return view('admin.profile.edit_profile',$data);
    }
    public function updateProfile(request $request,$id){
        $users['first_name']=isset($request['first_name']) ? $request['first_name']:'';
        $users['last_name']=isset($request['last_name']) ? $request['last_name']:'';
        $users['father_name']=isset($request['father_name']) ? $request['father_name']:'';
        $users['mother_name']=isset($request['mother_name']) ? $request['mother_name']:'';
        $users['email']=isset($request['email']) ? $request['email']:'';
        $users['mobile_number']=isset($request['mobile_number']) ? $request['mobile_number']:'';
        $users['city']=isset($request['city']) ? $request['city']:'';
        $users['gender']=isset($request['gender']) ? $request['gender']:'';
    	$users['dob']=isset($request['dob']) ? date('Y-m-d',strtotime($request['dob'])):'';
    	$users['date_joining']=isset($request['date_joining']) ? date('Y-m-d',strtotime($request['date_joining'])):'';
        $users['marital_status']=isset($request['marital_status']) ? $request['marital_status']:'';
        $users['qualification']=isset($request['qualification']) ? $request['qualification']:'';
        $users['address']=isset($request['address']) ? $request['address']:'';
        $users['permanent_address']=isset($request['permanent_address']) ? $request['permanent_address']:'';
        $users['work_experience']=isset($request['work_experience']) ? $request['work_experience']:'';
        $users['descriptions']=isset($request['descriptions']) ? $request['descriptions']:'';
    
    	if($request->hasFile('photo')){
            if ($request->file('photo')->isValid()){
                $file = $request->file('photo');
                $name = $file->getClientOriginalName();
                $file->move('assets/images/',$name);
                $users['photo'] = $name;
            }
        }
    	$check_email=DB::table('users')->where('email',$users['email'])->first();
    	$check_mobile_number=DB::table('users')->where('mobile_number',$users['mobile_number'])->first();
    	if(($check_email && $check_email->id == $id) || ($check_mobile_number && $check_mobile_number->id == $id)){
	        $data=DB::table('users')->where('id',$id)->update($users);
    		$response['success']="Profile Successfully Updated";
    	}
    	else{
    		$response['errors']="Email or Mobile number already exists";
    	}
    	return back()->with($response);
    }
    public function profilePassword()
    {
        $data['user']=auth()->user();
    	return view('admin.settings.changePassword',$data);
    } 
    public function changePassword(request $request,$id)
    {
        $old_password=$request['old_password'];
        $new_password=$request['new_password'];
        $repassword=$request['repassword'];
        $check_password=DB::table('users')->where('id',$id)->value('password');
    	if (Hash::check($old_password,$check_password)){
        	if($new_password == $repassword){
        		$data=DB::table('users')->where('id',$id)->update(['password'=>Hash::make($new_password)]);
        		if(!empty($data)){
	        		$response['success']="Password Updated Successfully";
        		}
        		else{
        			$response['errors']="Not Updated Data";
        		}
        	}
        	else{
        		$response['errors']="Both New password doesn't match";
        	}
        }
        else{
        	$response['errors']="Password doesn't exists";
        }
    	return back()->with($response);
    }
    public function changeImage(request $request,$id){
        if($request->hasFile('photo')){
            if ($request->file('photo')->isValid()){
                $file = $request->file('photo');
                $name = $file->getClientOriginalName();
                $file->move('assets/images/',$name);
                $users['photo'] = $name;
                if(!empty($users['photo'])){
                    $data=DB::table('users')->where('id',$id)->update($users);
                    if(!empty($data)){
                        $response['success']="Profile Image Updated";
                    }
                    else{
                        $response['errors']="Profile Image Not Updated";
                    }
                }
            }
        }
        else{
            $response['errors']="Profile Image Not Selected";
        }
        return back()->with($response);
    }
}
