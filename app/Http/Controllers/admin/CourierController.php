<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Courier;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
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






}
