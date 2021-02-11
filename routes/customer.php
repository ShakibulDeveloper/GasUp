<?php

use Illuminate\Support\Facades\Route;

Route::get('/new_order', 'Customer\CustomerController@index')->name('new_order')->middleware('can:Customer');
Route::post('/new_order/store', 'Customer\CustomerController@new_order_store')->name('new.order.store')->middleware('can:Customer');
Route::get('/orders', 'Customer\CustomerController@orders')->name('orders')->middleware('auth')->middleware('can:Customer');
Route::get('/all/orders', 'Customer\CustomerController@all_orders')->name('all.orders')->middleware('auth')->middleware('can:Admin');
Route::get('/overview', 'Customer\CustomerController@overview')->name('overview')->middleware('auth');
