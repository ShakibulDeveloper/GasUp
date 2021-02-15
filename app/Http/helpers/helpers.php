<?php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Gas;
use App\User;
use App\Order;


if(!function_exists('showflash')){
    function showflash(){
        if(session('success')){
            echo '<div class="alert alert-success alert-dismissable"> ';
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              print_r(session('success'));
              echo'</div>';
        }else if(session('errors')){
            echo '<div class="alert alert-danger alert-dismissable"> ';
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              print_r(session('errors'));
              echo'</div>';
        }
        else if(session('inform')){
            echo '<div class="alert alert-warning alert-dismissable"> ';
              echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              print_r(session('inform'));
              echo'</div>';
        }
    }
}

function Replace($data) {
    $data = str_replace("'", "", $data);
    $data = str_replace("!", "", $data);
    $data = str_replace("@", "", $data);
    $data = str_replace("#", "", $data);
    $data = str_replace("$", "", $data);
    $data = str_replace("%", "", $data);
    $data = str_replace("^", "", $data);
    $data = str_replace("&", "", $data);
    $data = str_replace("*", "", $data);
    $data = str_replace("(", "", $data);
    $data = str_replace(")", "", $data);
    $data = str_replace("+", "", $data);
    $data = str_replace("=", "", $data);
    $data = str_replace(",", "", $data);
    $data = str_replace(":", "", $data);
    $data = str_replace(";", "", $data);
    $data = str_replace("|", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace('"', "", $data);
    $data = str_replace("?", "", $data);
    $data = str_replace("  ", "_", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace(".", "-", $data);
    $data = strtolower(str_replace("  ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace("__", "-", $data));
    return str_replace("_", "-", $data);
}

function Short_Text($data,$length){
    $first_part = explode(" ",$data);
    $main_part = strip_tags(implode(' ',array_splice($first_part,0, $length)));
    return $main_part ."...." ;
}

function NewFile($name, $data){
    $fh = fopen($name, "w");
    fwrite($fh,$data);
    fclose($fh);
}

function ViewFile($name){
    $fh = fopen($name, "r");
    $data = fread($fh,filesize($name));
    fclose($fh);
    return $data;
}

function Find_fist_int($string){
    preg_match_all('!\d+!', $string, $matches);
    if($matches[0] != ""){
        foreach($matches[0] as $key => $value){
            $url = $value;
            return $url;
            break;
        }
    }
}

function gases()
{
    return Gas::select('name')->get();
}

function userCount()
{
    return User::count();
}

function orderCount()
{
    if (Auth::user()->user_type == 'Admin') {
        return Order::count();
    }else{
        return Order::where('owner_id', Auth::user()->id)->count();
    }
}

function revenue()
{
    if (Auth::user()->user_type == 'Admin') {
        return Order::where('payment_status', 'Paid')->sum('price');
    }else{
        return Order::where('owner_id', Auth::user()->id)->where('payment_status', 'Paid')->sum('price');
    }
}

function earnedCost()
{
    if (Auth::user()->user_type == 'Admin') {
        return 'Revenue';
    }else{
        return 'Expense';
    }
}

function revenueChart()
{
    if (Auth::user()->user_type == 'Admin') {
        $date = Carbon::today()->subDays(7);
        return Order::where('created_at', '>=', $date)->select('price')->get();
    }else{
        $date = Carbon::today()->subDays(7);
        return Order::where('created_at', '>=', $date)->where('owner_id', Auth::user()->id)->select('price')->get();
    }

}

function todayChart()
{
    if (Auth::user()->user_type == 'Admin') {
        return Order::where('created_at', '>=', Carbon::today())->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today())->where('owner_id', Auth::user()->id)->count();
    }
}
function lastdayChart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(1))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(1))->where('owner_id', Auth::user()->id)->count();
    }
}

function day3Chart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(2))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(2))->where('owner_id', Auth::user()->id)->count();
    }
}
function day4Chart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(3))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(3))->where('owner_id', Auth::user()->id)->count();
    }
}
function day5Chart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(4))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(4))->where('owner_id', Auth::user()->id)->count();
    }
}
function day6Chart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(5))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(5))->where('owner_id', Auth::user()->id)->count();
    }
}
function day7Chart()
{
    
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(6))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(6))->where('owner_id', Auth::user()->id)->count();
    }
}
function day8Chart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(7))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(7))->where('owner_id', Auth::user()->id)->count();
    }
}
function day9Chart()
{
    if (Auth::user()->user_type == 'Admin') {
    return Order::where('created_at', '>=', Carbon::today()->subDays(8))->count();
    }else{
        return Order::where('created_at', '>=', Carbon::today()->subDays(8))->where('owner_id', Auth::user()->id)->count();
    }
}


//path is storage/app/
function filePath($file)
{
    return asset($file);
}

//delete file
function fileDelete($file)
{
    if ($file != null) {
        if (file_exists(public_path($file))) {
            unlink(public_path($file));
        }
    }
}

//uploads file
// uploads/folder
function fileUpload($file, $folder)
{
    return $file->store('public/uploads/' . $folder);
}

function deliveries($id)
{
    return Order::where('delivered_by', $id)->get();
}

// avatar

function avatar()
{
    return asset('public/ava.png');
}

function user_photo()
{
    return User::where('id', Auth::user()->id)->first();
}