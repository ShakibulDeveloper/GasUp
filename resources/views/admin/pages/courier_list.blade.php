@extends('admin.layouts.master')
@section('content')

<!--  {{showFlash()}} -->
<style type="text/css">
  th,td{
    padding: 5px !important;
  }
</style>

<div class="col-sm-9 right_contents">
  <div class="main_inner_content">
  
    <div class="bredcrums">
      <ul>
        <li><a href="#" class="active">Couriers Overview</a></li>
      </ul>
    </div>
    <div class="main_heading">
      <h3>Couriers</h3>
    </div>
    <div class="sort_by">
      <label>Sort By:</label>
      <select>
        <option>All Customers</option>
      </select>
    </div>
    <div class="table_box">
      <h4>Courier List (Waiting for Validation)</h4>
      <div class="table-responsive">
        <table class="datatable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Courier name</th>
              <th>MyKad/Passport</th>
              <th>Gender</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
     
            @foreach($rejects as $reject)
            <tr>
              <td><span class="red"></span>{{isset($reject->first_name) ? $reject->first_name:'No Name'}} {{isset($reject->last_name) ? $reject->last_name:''}}</td>
              <td>{{isset($reject->passport) ? $reject->passport:'No Passport'}}</td>
              <td>{{isset($reject->gender) ? $reject->gender:'No Gender'}}</td>
              <td>{{isset($reject->mobile_number) ? $reject->mobile_number:'No Number'}}</td>
              <td>{{isset($reject->email) ? $reject->email:''}}</td>
              <td><a href="{{route('courier_detail')}}/{{isset($reject->id) ? $reject->id:''}}">View Details</a></td>
            </tr>
            @endforeach
    
          </tbody>
        </table>
      </div>
      <hr>
      <h4>Courier List(Validated)</h4>
      <div class="table-responsive">
        <table class="datatable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Courier name</th>
              <th>MyKad/Passport</th>
              <th>Gender</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($valids as $key=>$row)
            <tr>
              <td><span class="active"></span>{{isset($row->first_name) ? $row->first_name:''}} {{isset($row->last_name) ? $row->last_name:''}} </td>
              <td>{{isset($row->cnic) ? $row->cnic:''}}</td>
              <td>{{isset($row->gender) ? $row->gender:''}}</td>
              <td>{{isset($row->mobile_number) ? $row->mobile_number:''}}</td>
              <td>{{isset($row->email) ? $row->email:''}}</td>
              <td><a href="{{route('courier_details')}}/{{isset($row->id) ? $row->id:''}}">View Details</a></td>
            </tr>
            @endforeach
           <!--  <tr>
              <td><span class="active"></span> Asad khalid</td>
              <td>03333-33-22</td>
              <td>Male</td>
              <td>033254875</td>
              <td>asadkhalid@gamil.com</td>
              <td><a href="#">View Details</a></td>
            </tr> -->

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection