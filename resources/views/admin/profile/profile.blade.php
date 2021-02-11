@extends('admin.layouts.master')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-5">
      {{showFlash()}}
      <div class="row">
        <div class="col-sm-12">
          <form action="{{url('/updateProfile/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-top:15px">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header card_header_bg">
                    <div class="row">
                      <div class="col-sm-6">
                         <h6 class="mb-0">Profile</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body" id="profile_data">
                    <div class="table-responsive">
                      <table class="table table-hover table-white ">
                        <tbody>
                          <tr>
                            <td>UserName</td>
                            <td>
                            	<input type="text" name="first_name" placeholder="@isset($user->first_name){{$user->first_name}}@endisset @isset($user->last_name){{$user->last_name}}@endisset" value="" style="border:none;" class="form-control">
                            </td>
                          </tr>
                          <tr>
                            <td>Email Address</td>
                            <td>
                            	<input type="text" name="first_name" placeholder="@isset($user->email){{$user->email}}@endisset" value="" style="border:none;" class="form-control">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right">
                    	<button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <form action="{{url('/changePassword/'.$user->id)}}" method="POST">
            @csrf
            <div class="row" style="margin-top:15px">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header card_header_bg">
                    <div class="row">
                      <div class="col-sm-6">
                         <h6 class="mb-0">Change Password</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body" id="profile_data">
                    <div class="table-responsive">
                      <table class="table table-hover table-white ">
                        <tbody>
                          <tr>
                            <td>Old Password</td>
                            <td>
                            	 <input type="password" name="old_password" required="" class="form-control" style="border:none;" placeholder=".......">
                            </td>
                          </tr>
                          <tr>
                            <td>New Password</td>
                            <td>
                            	<input type="password" name="new_password" required="" class="form-control" style="border:none;" placeholder=".......">
                            </td>
                          </tr>
                          <tr>
                            <td>Repeat Password</td>
                            <td>
                            	<input type="password" name="repassword" required="" class="form-control" style="border:none;" placeholder=".......">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="text-right">
                    	<button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection