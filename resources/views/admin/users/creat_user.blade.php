@extends('admin.layouts.master')
@section('content')
<div class="col-sm-9 right_contents">
  
  {{showFlash()}}
  <div class="card">
     <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-info">
          <div class="panel-body">
            <form action="{{route('creatuser')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row" style="margin-top:15px">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header card_header_bg">
                      <h6 class="mb-0">Apply For Courierman</h6>
                    </div>
                    <div class="card-body">   
                      <div class="row">
                        <input type="hidden" name="id" value="@isset($model->id){{$model->id}}@endisset">
                        <div class="col-sm-3">
                            <div class="form-group">
                               <label>First Name</label>
                               <input type="text" name="first_name" required="" value="@isset($model->first_name){{$model->first_name}}@endisset" class="form-control" placeholder="Enter first name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <label>Last Name</label>
                               <input type="text" name="last_name" required="" value="@isset($model->last_name){{$model->last_name}}@endisset" class="form-control" placeholder="Enter last name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <label>Father Name</label>
                               <input type="text" name="father_name" required="" value="@isset($model->father_name){{$model->father_name}}@endisset" class="form-control" placeholder="Father Name">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                               <label>Mother Name</label>
                               <input type="text" name="mother_name" value="@isset($model->mother_name){{$model->mother_name}}@endisset" class="form-control" placeholder="Mother Name">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                             <label>Email/Username</label>
                             <input type="text" name="email" required="" value="@isset($model->email){{$model->email}}@endisset" class="form-control" placeholder="Enter Email">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Password</label>
                            @if(isset($model->password) && $model->password)
                            <input type="password" name="password" value="" class="form-control" placeholder="">
                            @else
                            <input type="password" name="password" value="" required="" class="form-control" placeholder="Enter Password">
                            @endif
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" value="@isset($model->mobile_number){{$model->mobile_number}}@endisset" required="" class="form-control" placeholder="Mobile Number">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>My Passport</label>
                            <input type="text" name="passport" value="@isset($model->passport){{$model->passport}}@endisset" required="" class="form-control" placeholder="My Passport">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" required="" value="@isset($model->city){{$model->city}}@endisset" class="form-control" placeholder="Enter City">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Gender</label>
                            <select required="" name="gender" class="form-control">
                              <option value="">--select--</option>
                              <option <?php echo (isset($model->gender) && $model->gender == 'Male') ? 'selected':'';?> value="Male">Male</option>
                              <option <?php echo (isset($model->gender) && $model->gender == 'Female') ? 'selected':'';?> value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="text" name="dob" required="" autocomplete="off" value="@isset($model->dob){{date('M d Y',strtotime($model->dob))}}@endisset" class="form-control datepicker1">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Date Of Joining</label>
                            <input type="text" name="date_joining" value="@isset($model->date_joining){{date('M d Y',strtotime($model->date_joining))}}@endisset" autocomplete="off" class="form-control datepicker1">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Marital Status</label>
                            <select required="" name="marital_status" class="form-control">
                              <option value="">--select--</option>
                              <option <?php echo (isset($model->marital_status) && $model->marital_status == 'Single') ? 'selected':'';?> value="Single">Single</option>
                              <option <?php echo (isset($model->marital_status) && $model->marital_status == 'Married') ? 'selected':'';?> value="Married">Married</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" value="" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Passport Front</label>
                            <input type="file" name="passport_front" value="" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>Passport back</label>
                            <input type="file" name="passport_back" value="" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                             <label> Current Address</label>
                             <textarea name="address" class="form-control">@isset($model->address){{$model->address}}@endisset</textarea>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                             <label>Permanent Address</label>
                             <textarea name="permanent_address" class="form-control">@isset($model->permanent_address){{$model->permanent_address}}@endisset</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                             <label>Work Experience</label>
                             <textarea name="work_experience" class="form-control">@isset($model->work_experience){{$model->work_experience}}@endisset</textarea>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                             <label>Descriptions</label>
                             <textarea name="descriptions" class="form-control">@isset($model->descriptions){{$model->descriptions}}@endisset</textarea>
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
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')


