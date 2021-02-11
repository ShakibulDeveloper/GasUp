<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gas;

class GasController extends Controller
{

    public function create()
    {
        return view('admin.pages.gas');
    }
    public function store(Request $request)
    {
        $gas = new Gas;
        $gas->name = $request->name;
        $gas->price = $request->price;
        $gas->save();

        return back();
    }


    public function getPrice(Request $request)
    {
        return Gas::where('name', $request->name)->first()->price;
    }


    public function calc_gas_price(Request $request)
    {
        $gas = Gas::where('name', $request->gas)->first()->price;
        return $price = $request->litre * $gas;
    }
    //END
}
