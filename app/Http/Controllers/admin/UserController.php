<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Courier;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
    	// $this->middleware('auth');
    }

    public function index()
    {
        $data=User::all();
    	return view('admin.users.users_list', compact('data'));
    }
    public function addNewUser()
    {
        return view('admin.users.creat_user');
    }
    public function userroles()
    {
        $data=[];
        $data['alldata']=DB::table('roles')->orderBy('id','desc')->get();
        return view('admin.users.user_role',$data);
    }
    public function creatrole(Request $request)
    {
        $response=[];
        if(!empty($request))
            {
                $request['name']=strtolower($request['name']);
                if($request->has('id') && $request['id']!='')
                {
                    $success=DB::table('roles')->where('id',$request['id'])->update(['name' => $request['name']]);
                    if($success)
                    {
                        $response['success']='Updated Successfully';
                    }
                    else
                    {
                        $response['errors']='Error occurred try later!';
                    }
                }else{
                    $check=Role::where(['name' => $request['name']])->first();
                    if(!empty($check))
                    {
                        $response['errors']='This Role Already Exist';
                        return back()->with($response);
                    }
                    $role = Role::create(['name' => $request['name']]);
                    if($role)
                    {
                        $response['success']='Created Successfully';
                    }
                    else
                    {
                        $response['errors']='Error occurred try later!';
                    }
                }
        }
        return redirect('/userroles')->with($response);
    }
    public function edituserroles($id=null)
    {
        $data=[];
        if($id!=null)
        {
            $data['model']=DB::table('roles')->where('id',$id)->first();
        }
        return view('admin.users.edit_user_role',$data);
    }
    public function assignpermissiontorole(Request $request)
    {
        $role_id=$request->role_id;
        DB::table('role_has_permissions')->where('role_id',$role_id)->delete();
        if(!empty($request['permissionss'])){
            foreach ($request['permissionss'] as $key => $value) {
                if($role_id >  0){
                    $role=Role::find($role_id);
                    $role->givePermissionTo($value);
                }
            }

        }
        $response['success']='Permissions Updated Successfully';
        return back()->with($response);
    }
    public function adduserpermissions($role_id=null)
    {
        $data=[];
        if($role_id == null || $role_id <= 0 || $role_id == '')
        {
        	$response['errors']='Select Role';
        	return redirect('/userpermissions')->with($response);
        }
        $data['userroles']=DB::table('roles')->get();
        $data['permissions'] = array('View', 'Add', 'Edit', 'Delete');
        $data['modules']=DB::table('modules')->get();
        if(!empty($data['modules']))
        {
            foreach ($data['modules'] as $key => &$module)
            {
                if(isset($module->id))
                {
                    $permissionss=DB::table('permissions')->where('module_id',$module->id)->get();
                    $return_permissionss = array();
                    if(!empty($permissionss)) {
                        foreach ($permissionss as &$value) {
                            $flag=0;
                            $rolehaspermission=DB::table('role_has_permissions')->where('role_id',$role_id)->where('permission_id',$value->id)->first();
                            if(!empty($rolehaspermission))
                            {
                                $flag=1;
                            }
                            $value->flag=$flag;
                            $return_permissionss[$value->order_id] = $value;
                        }
                    }
                    $module->permissionss = $return_permissionss;
                }
            }
        }
        $data['role_id']=$role_id;
        return view('admin.users.user_premission',$data);
    }
    public function userpermissions()
    {
        $data=[];
        $data['userroles']=DB::table('roles')->get();
        $data['permissions'] = array('View', 'Add', 'Edit', 'Delete');
        $data['modules']=DB::table('modules')->get();
        if(!empty($data['modules']))
        {
            foreach ($data['modules'] as $key => &$module)
            {
                if(isset($module->id))
                {
                    $permissionss=DB::table('permissions')->leftJoin('role_has_permissions','permissions.id','=','role_has_permissions.permission_id')->where('module_id',$module->id)->get();
                    $return_permissionss = array();
                    if(!empty($permissionss)) {
                        foreach ($permissionss as &$value) {
                            $return_permissionss[$value->order_id] = $value;
                        }
                    }
                    $module->permissionss = $return_permissionss;
                }
            }
        }
        return view('admin.users.user_premission',$data);
    }
    public function creatuser(Request $request)
    {
        $user = new Courier;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->mobile_number = $request->mobile_number;
        $user->passport = $request->passport;
        $user->city = $request->city;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->date_joining = $request->date_joining;
        $user->marital_status = $request->marital_status;


        if ($request->hasFile('photo')) {
            $photo_upload     =  $request ->photo;
            $photo_extension  =  $photo_upload -> getClientOriginalExtension();
            $photo_name       =  rand(1000,100000) . "." . $photo_extension;
            $user->photo = $photo_name;
        }


        if ($request->hasFile('passport_front')) {
            $photo_upload     =  $request ->passport_front;
            $photo_extension  =  $photo_upload -> getClientOriginalExtension();
            $photo_name       =  rand(1000,100000) . "." . $photo_extension;
            $user->passport_front = $photo_name;
        }


        if ($request->hasFile('passport_back')) {
            $photo_upload     =  $request ->passport_back;
            $photo_extension  =  $photo_upload -> getClientOriginalExtension();
            $photo_name       =  rand(1000,100000) . "." . $photo_extension;
            $user->passport_back = $photo_name;
        }

        $user->address = $request->address;
        $user->permanent_address = $request->permanent_address;
        $user->work_experience = $request->work_experience;
        $user->descriptions = $request->descriptions;
        $user->validate = false;
        $user->save();



        if ($request->hasFile('photo')) {
            $photo_upload     =  $request ->photo;
            $photo_extension  =  $photo_upload -> getClientOriginalExtension();
            $photo_name       =  rand(1000,100000) . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/assets/images/'.$photo_name),100);
            Courier::find($user->id)->update([
            'photo'          => $photo_name,
            ]);
      }


        if ($request->hasFile('passport_front')) {
            $photo_upload     =  $request ->passport_front;
            $photo_extension  =  $photo_upload -> getClientOriginalExtension();
            $photo_name       =  rand(1000,100000) . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/assets/images/'.$photo_name),100);
            Courier::find($user->id)->update([
            'passport_front'          => $photo_name,
            ]);
      }


        if ($request->hasFile('passport_back')) {
            $photo_upload     =  $request ->passport_back;
            $photo_extension  =  $photo_upload -> getClientOriginalExtension();
            $photo_name       =  rand(1000,100000) . "." . $photo_extension;
            Image::make($photo_upload)->save(base_path('public/assets/images/'.$photo_name),100);
            Courier::find($user->id)->update([
            'passport_back'          => $photo_name,
            ]);
      }

        return back();
    }


    public function edituser($id=null)
    {
        $data=[];
        if($id!=null){
            $data['model']=User::find($id);
            if(isset($data['model']->id))
            {
                $data['user_role']=DB::table('model_has_roles')->where('model_id',$data['model']->id)->first();
            }
        }
        $data['roles']=DB::table('roles')->orderBy('id','desc')->get();
        return view('admin.users.creat_user',$data);
    }


}
