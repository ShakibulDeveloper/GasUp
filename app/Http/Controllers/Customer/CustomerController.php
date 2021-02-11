<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use App\Gas;
use App\Courier;
use App\User;
use App\MostPurchase;
use App\merge\SignUp;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marge_validation_check = Auth::user()->marge_validation;
        return view('customer.new_order',compact('marge_validation_check'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new_order_store(Request $request)
    {
        $gas = Gas::where('name', $request->gas)->first()->price;
        $price = $request->litre * $gas;

        $date_time = date('h:i a', time() + 6*3600);

        $order = new Order;
        $order->owner_id = Auth::user()->id;
        $order->name = $request->name;
        $order->gas = $request->gas;
        $order->litre = $request->litre;
        $order->price = $price;
        $order->payment_status = $request->payment_status;
        $order->address = $request->address;
        $order->order_id = rand(1000, 10000);
        $order->delivered_by = null;

        $order->product_name = $request->gas;
        $order->quantity = $request->litre;
        $order->date = $request->date;
        $order->username = SignUp::where('email', Auth::user()->email)->first()->username;
        $order->courier = 'Liew Yi Xian';
        $order->tank = $request->tank;
        $order->time = $date_time;
        $order->status = 1;
        $order->save();

        // most purchase...
        if (MostPurchase::where('product_name', $request->gas)->exists()) {
          $previous_litre = MostPurchase::where('product_name', $request->gas)->first()->quantity;
          $new_litre = $request->litre;
          $update_litre = $previous_litre+$new_litre;
          $date = date('h:i a', time() + 6*3600);
          MostPurchase::where('product_name', $request->gas)->update([
            'quantity' => $update_litre,
            'time' => $date_time,
          ]);
        }
        else {
          MostPurchase::insert([
            'product_name' => $request->gas,
            'quantity' => $request->litre,
            'time' => $date_time,
            'created_at' => Carbon::now(),
          ]);
        }


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }

    public function orders()
    {
        $orders = Order::latest()->where('owner_id', Auth::user()->id)->get();
        return view('customer.orders', compact('orders'));
    }

    // public function all_orders()
    // {
    //     $orders = Order::latest()->get();
    //     $couriers = Courier::where('validate', true)->select('_id', 'first_name', 'last_name')->get();
    //     return view('admin.orders', compact('orders','couriers'));
    // }

    // dashboard overall order view function
    function order_overall ()
    {
      $orders = Order::all();
      $last = Order::latest()->first();
      $latest_four_orders = Order::latest()->paginate(4);
      $active_orders = Order::where('status', 1)->get();
      $cancel_orders = Order::where('status', 2)->get();
      $graph_product1 = MostPurchase::where('product_name', "Mira Gas")->first();
      $graph_product2 = MostPurchase::where('product_name', "Petronas")->first();
      $graph_product3 = MostPurchase::where('product_name', "Petron")->first();
      $graph_product4 = MostPurchase::where('product_name', "BHP")->first();
      $graph_product5 = MostPurchase::where('product_name', "Solar Gas")->first();
      $graph_product6 = MostPurchase::where('product_name', "My Gaz")->first();
      return view('dashboard/order', compact('orders', 'latest_four_orders','last','active_orders','cancel_orders','graph_product1','graph_product2','graph_product3','graph_product4','graph_product5','graph_product6'));
    }

    // all orders view function
    function all_orders ()
    {
      $orders = Order::latest()->get();
      return view('dashboard/all_order', compact('orders'));
    }

    public function overview()
    {
      $single_courier = User::where('_id', Auth::user()->id)->first();
        return view('customer.overview', compact('single_courier'));
    }


    function customer_view()
{
  $users = SignUp::latest()->paginate(9);
  $graph_product1 = MostPurchase::where('product_name', "Mira Gas")->first();
  $graph_product2 = MostPurchase::where('product_name', "Petronas")->first();
  $graph_product3 = MostPurchase::where('product_name', "Petron")->first();
  $graph_product4 = MostPurchase::where('product_name', "BHP")->first();
  $graph_product5 = MostPurchase::where('product_name', "Solar Gas")->first();
  $graph_product6 = MostPurchase::where('product_name', "My Gaz")->first();
  $orders = Order::all();
  $active_orders = Order::where('status', 1)->get();
  $cancel_orders = Order::where('status', 2)->get();
  $tank_size1 = Order::where('tank', "14KG")->get();
  $tank_size2 = Order::where('tank', "12KG")->get();
  $tank_size3 = Order::where('tank', "10KG")->get();
  return view('dashboard/customer_overview',compact('users','graph_product1','graph_product2','graph_product3','graph_product4','graph_product5','graph_product6','active_orders','cancel_orders','orders','tank_size1','tank_size2','tank_size3'));
}
function all_customer()
{
  $users = SignUp::all();
  return view('dashboard.all_customer',compact('users'));
}

function customer_details($user_id)
{
  $user = SignUp::where('_id',$user_id)->first();
  $order_username = SignUp::where('_id',$user_id)->first()->username;
  $get_user_orders = Order::where('username', $order_username)->latest()->paginate(4);
  $get_user_orders_all = Order::where('username', $order_username)->get();
  $most_purchased_product = Order::where('username', $order_username)->max('product_name');
  $most_purchased_product_times = Order::where('username', $order_username)->where('product_name', $most_purchased_product)->count();
  $most_purchased_product2 = Order::where('username', $order_username)->max('tank');
  $most_purchased_product2_times = Order::where('username', $order_username)->where('tank', $most_purchased_product2)->count();
  $order_cancel = Order::where('username', $order_username)->where('status', '!=', 1)->get()->count();
  $tank1 = Order::where('username', $order_username)->where('tank', '14KG')->get()->count();
  $tank2 = Order::where('username', $order_username)->where('tank', '12KG')->get()->count();
  $tank3 = Order::where('username', $order_username)->where('tank', '10KG')->get()->count();
  $graph_product1 = MostPurchase::where('product_name', "Mira Gas")->first();
  $graph_product2 = MostPurchase::where('product_name', "Petronas")->first();
  $graph_product3 = MostPurchase::where('product_name', "Petron")->first();
  $graph_product4 = MostPurchase::where('product_name', "BHP")->first();
  $graph_product5 = MostPurchase::where('product_name', "Solar Gas")->first();
  $graph_product6 = MostPurchase::where('product_name', "My Gaz")->first();
  return view('dashboard/customer_details',compact('user','get_user_orders','get_user_orders_all','user_id','most_purchased_product','most_purchased_product2','most_purchased_product_times','most_purchased_product2_times','order_cancel','tank1','tank2','tank3','graph_product1','graph_product2','graph_product3','graph_product4','graph_product4','graph_product5','graph_product6'));
}

function customer_details_all($user_id){
  $user = SignUp::where('_id',$user_id)->first();
  $order_username = SignUp::where('_id',$user_id)->first()->username;
  $get_user_orders_all = Order::where('username', $order_username)->get();
  return view('dashboard/customer_details_all',compact('get_user_orders_all','user'));
}


}
