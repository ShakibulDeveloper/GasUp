@extends('admin.layouts.master')
@section('content')
<div class="page-holder w-100 d-flex flex-wrap">
  <div class="container-fluid px-xl-5">
    <section class="py-5">
      {{showFlash()}}
      <div class="row" style="margin-top:15px">
        <div class="col-sm-12">
            <a href="{{url('/profile/'.$user->id)}}" class="btn btn-info"><i class="fa fa-reply"></i>
              Back
            </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <form action="{{url('/updateProfile/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-header card_header_bg">
                <h6 class="mb-0">Profile</h6>
              </div>
              <div class="card-body">
                <div class="row">
                <div class="col-sm-9">   
                  <div class="row">
                    <input type="hidden" name="id" value="@isset($user->id){{$user->id}}@endisset">
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label>First Name</label>
                         <input type="text" name="first_name" required="" value="@isset($user->first_name){{$user->first_name}}@endisset" class="form-control" placeholder="Enter first name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                           <label>Last Name</label>
                           <input type="text" name="last_name" required="" value="@isset($user->last_name){{$user->last_name}}@endisset" class="form-control" placeholder="Enter last name">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                           <label>Father Name</label>
                           <input type="text" name="father_name" required="" value="@isset($user->father_name){{$user->father_name}}@endisset" class="form-control" placeholder="Father Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label>Email/Username</label>
                         <input type="text" name="email" required="" value="@isset($user->email){{$user->email}}@endisset" class="form-control" placeholder="Enter Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select required="" name="gender" class="form-control">
                          <option value="">--select--</option>
                          <option <?php echo (isset($user->gender) && $user->gender == 'Male') ? 'selected':'';?> value="Male">Male</option>
                          <option <?php echo (isset($user->gender) && $user->gender == 'Female') ? 'selected':'';?> value="Female">Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="text" name="dob" required="" autocomplete="off" value="@isset($user->dob){{date('M d Y',strtotime($user->dob))}}@endisset" class="form-control datepicker1">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Assign Role</label>
                        <select name="role_id" required="" class="form-control">
                            <option value="">--select--</option>
                            @if(!empty($roles))
                              @foreach($roles as $value)
                                <option <?php echo (isset($user->role_id) && $user->role_id == $value->id) ? 'selected':'';?> value="@isset($value->id){{$value->id}}@endisset">
                                  @isset($value->name){{$value->name}}@endisset
                                </option>
                              @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Photo</label>
                    <div>
                    <img src="{{asset('assets/images/'.auth()->user()->photo)}}" alt="profile image" height="200" width="100%">
                    </div>
                    <input type="file" name="photo" value="@isset($user->photo){{$user->photo}}@endisset" class="form-control">
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-info">Save</button>
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