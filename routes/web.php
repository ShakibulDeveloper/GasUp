<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE';
});
Route::get('/', function () {
    // return todayChart();
	return redirect()->route('login');
});

Auth::routes();

// Courier Routes
Route::get('/courier_overview', 'admin\CourierController@index')->name('courier_overview.index')->middleware('auth');
Route::get('/validate_courier/{id?}', 'admin\CourierController@validate_courier')->name('validate_courier')->middleware('auth');
Route::get('/reject_courier/{id?}', 'admin\CourierController@reject_courier')->name('reject_courier')->middleware('auth');
Route::get('/apply_for_courier','admin\UserController@addNewUser')->name('addNewUser');
Route::post('/creatuser','admin\UserController@creatuser')->name('creatuser');
Route::get('/sale', 'admin\CourierController@sale')->name('sale')->middleware('auth');
Route::get('/courier_details/{id?}', 'admin\CourierController@courier_details')->name('courier_details')->middleware('auth');
Route::get('/courier_detail/{id?}', 'admin\CourierController@courier_detail')->name('courier_detail')->middleware('auth');
Route::post('/order/assign/{id?}', 'admin\CourierController@order_assign')->name('order_assign')->middleware(['auth', 'can:Admin']);

// New route
Route::post('/new_register', 'AuthController@new_register')->name('new_register');
Route::get('/gas', 'GasController@create')->name('gas');
Route::post('/gas/store', 'GasController@store')->name('gas.store');
Route::get('/gas/get/price', 'GasController@getPrice')->name('gas.get.price');
Route::get('/gas/calc/price', 'GasController@calc_gas_price')->name('calc.gas.price');

Route::get('/recent/delivery', 'admin\CourierController@recent_delivery')->name('recent_delivery');
Route::post('/recent/delivery/store', 'admin\CourierController@recent_delivery_store')->name('recent_delivery_store');

// ----------------------------------------------------------------------------------------------

//Users Routes
Route::get('/users', 'admin\UserController@index')->name('users')->middleware(['auth', 'can:Admin']);

Route::get('/edituser/{id}','admin\UserController@edituser')->name('edituser');
Route::get('/deleteuser/{id}','admin\UserController@deleteuser')->name('deleteuser');

Route::get('/userpermissions', 'admin\UserController@userpermissions')->name('userpermissions')->middleware('auth');
Route::post('/assignpermissiontorole','admin\UserController@assignpermissiontorole')->name('assignpermissiontorole');
Route::get('/adduserpermissions/{id}','admin\UserController@adduserpermissions')->name('adduserpermissions');
Route::get('/userroles','admin\UserController@userroles')->name('userroles');
Route::post('/creatrole','admin\UserController@creatrole')->name('creatrole');
Route::get('/edituserroles/{id}','admin\UserController@edituserroles')->name('edituserroles');

Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/home', 'HomeController@index')->name('home');



// merge Routes
Route::post('merge/signup', 'merge\SignUpController@signup')->name('signup');
//Route::get('merge/login', '\LoginController@login')->name('login');
//Route::post('/login_check', '\LoginController@login_check')->name('login_check');
//Route::post('/orders', '\OrderController@orders')->name('orders');
Route::get('/dashboard/orders', 'Customer\CustomerController@order_overall')->name('order_overall');
Route::get('/dashboard/all/orders', 'Customer\CustomerController@all_orders')->name('all_orders');
Route::get('/customer', 'Customer\CustomerController@customer_view')->name('customer_view');
Route::get('/all/customer', 'Customer\CustomerController@all_customer')->name('all_customer');
Route::get('/customer/details/{user_id}', 'Customer\CustomerController@customer_details')->name('customer_details');
Route::get('/customer/details/all/{user_id}', 'Customer\CustomerController@customer_details_all')->name('customer_details_all');

//pushing updates in github
