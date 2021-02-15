<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Courier;
use Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Image;

class CourierController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }



    public function index()
    {
        $rejects = User::where('validate', false)->get();
        $valids = User::where('validate', true)->get();
        $orders = Order::latest()->get();
        $couriers = User::where('validate', true)->select('_id', 'first_name', 'last_name')->get();
        return view('admin.pages.courier_list', compact('rejects', 'valids', 'orders', 'couriers'));
    }
    public function sale()
    {
        $data=[];
        $data['sale']='active';
        return view('admin.pages.sale',$data);
    }
    public function courier_details($id)
    {
        $single_courier = User::where('_id', $id)->first();
        return view('admin.pages.couriers_d', compact('single_courier'));
    }
    public function courier_detail($id)
    {
        $single_courier = User::where('_id', $id)->first();
        return view('admin.pages.courier_details', compact('single_courier'));
    }

    public function validate_courier($id)
    {
        $update = User::where('_id', $id)->first();
        $update->validate = true;
        $update->save();

        if($update)
        {
            $response['success']='Courier Valided Successfully';
        }
        else
        {
            $response['errors']='Error occurred try later!';
        }
        return back()->with($response);

    }
     public function reject_courier($id=null)
    {
        $update = User::where('_id', $id)->first();
        $update->validate = false;
        $update->save();

        if($update)
        {
            $response['success']='Courier Rejected Successfully';
        }
        else
        {
            $response['errors']='Error occurred try later!';
        }
        return back()->with($response);
    }




    public function order_assign(Request $request, $id)
    {
        $order = Order::where('_id', $id)->first();
        $order->delivered_by = $request->delivered_by;
        $order->save();
        return back();
    }


    public function update_courier(Request $request)
    {

      $user = User::where('_id', Auth::user()->id)->first();
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


        if ($files = $request->file('photo')) {
       	// Define upload path
           $destinationPath = public_path('/uploads/'); // upload path
		// Upload Orginal Image
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);

           $insert['photo'] = $profileImage;
        }

        if ($files = $request->file('passport_front')) {
       	// Define upload path
           $destinationPath = public_path('/passport_front/'); // upload path
		// Upload Orginal Image
           $passport_front = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $passport_front);

           $insert['passport_front'] = $passport_front;
        }

        if ($files = $request->file('passport_back')) {
       	// Define upload path
           $destinationPath = public_path('/passport_back/'); // upload path
		// Upload Orginal Image
           $passport_back = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $passport_back);

           $insert['passport_back'] = $passport_back;
        }

        $user->photo=$profileImage;
        $user->passport_front=$passport_front;
        $user->passport_back=$passport_back;

        $user->address = $request->address;
        $user->permanent_address = $request->permanent_address;
        $user->work_experience = $request->work_experience;
        $user->descriptions = $request->descriptions;
        $user->save();





      return back();

    }



}
