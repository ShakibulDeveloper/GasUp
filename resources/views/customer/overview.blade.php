@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 right_contents">
  <div class="main_inner_content">


    @include('component.search')


    <div class="bredcrums">
      <ul>
        <li><a href="#" class="<?php echo (isset($active) && $active == 'courier_overview') ? 'active':''; ?>">Couriers Overview</a></li>
        <li><a href="#" ><i class="fa fa-angle-right"></i></a></li>
        <li><a href="#" class="<?php echo (isset($active) && $active == 'courier_detail') ? 'active':''; ?>">Couriers Details</a></li>
      </ul>
    </div>
    {{showFlash()}}
    <div class="row">
      <div class="col-sm-6 Details_Box">
        <div class="main_heading">
          <h3>Couriers Details</h3>
        </div>
      </div>
      <div class="col-sm-6 reject_box">
        <div class="validate_btns">
          <a href="{{route('validate_courier', $single_courier->id)}}">Validate</a>
          <a href="{{route('reject_courier', $single_courier->id)}}" class="reject_Btn">Reject</a>
        </div>
      </div>
    </div>

    <div class="profile_box">
      <div class="row">
        <div class="col-sm-6 profile_left">
          <img src="{{ asset('public/uploads/'.$single_courier->photo) }}">
          <h4>{{isset($single_courier->first_name) ? $single_courier->first_name:''}} {{isset($single_courier->last_name) ? $single_courier->last_name:'Liew Yi Xian'}}</h4>

          @if ($single_courier->validate == false)
          <p>Pending Validation</p>
          @else
          <p>Validated</p>
          @endif


        </div>
        <div class="col-sm-6 profile_right">
          <ul>
            <li>
              <div class="form_box">
                <label>My Card Passport</label>
                <input type="text" placeholder="{{isset($single_courier->cnic)?$single_courier->cnic:'0000000-00-000'}}" name="">
              </div>
            </li>
            <li>
              <div class="form_box">
                <label>Phone Number</label>
                <input type="text" placeholder="{{isset($single_courier->mobile_number)?$single_courier->mobile_number:'024569854'}}" name="">
              </div>
            </li>
            <li>
              <div class="form_box">
                <label>Email</label>
                <input type="text" placeholder="{{isset($single_courier->email)?$single_courier->email:'info@gamil.com'}}" name="">
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-6 card_pasport">
        <div class="inner_card">
          <p><b>My/Passport</b> {{isset($single_courier->cnic)?$single_courier->cnic:'0000000-00-000'}}</p>
          <div class="row">
            <div class="col-sm-6 left_card">
              <img src="{{asset('public/passport_front/'.$single_courier->passport_front)}}">
              <b>Front Picture</b>
            </div>
            <div class="col-sm-6 left_card">
              <img src="{{asset('public/passport_back/'.$single_courier->passport_back)}}">
              <b>Back Picture</b>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 card_pasport ">
        <div class="inner_card last_box">
          <p><b>Selfie Of Courier</b> </p>
          <div class="selfiebox">
            <img src="{{asset('public/uploads/'.$single_courier->photo)}}">
          </div>
        </div>
      </div>
    </div>





  </div>
</div>
@endsection
