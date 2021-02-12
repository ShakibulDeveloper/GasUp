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

    @include('component.search')
  
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


    <div class="table_box">
      <h4>Order List</h4>
      <div class="table-responsive">
        <table class="datatable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th>Name</th>
              <th>Gas</th>
              <th>Litre</th>
              <th>Price</th>
              <th>Address</th>
              <th>Status</th>
              <th>Data</th>
              <th>Delivered By</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @forelse($orders as $order)
            <tr>
              <td><span class="red"></span>{{  App\User::where('_id', $order->owner_id)->first()->email }}</td>
              <td>{{  $order->gas }}</td>
              <td>{{  $order->litre }}</td>
              <td>{{  $order->price }}</td>
              <td>{{  $order->address }}</td>
              <td>{{  $order->payment_status }}</td>
              <td>{{  $order->created_at }}</td>
              <form action="{{ route('order_assign', $order->_id) }}" method="post">
                @csrf

              <td>
                 <select name="delivered_by" id="" class="form-control">
                   @foreach ($couriers as $courier)
                     <option value="{{ $courier->_id }}" 
                      {{ $courier->_id ===  $order->delivered_by ? 'selected' : null}}>
                      {{ $courier->first_name }} {{ $courier->last_name }}
                    </option>
                   @endforeach
                 
                        </select>
              </td>


              <td>
                <button href="submit" class="btn-sm btn-primary">UPDATE</button>
              </form>

              </td>
            </tr>

            @empty

            <tr>
              <td colspan="9" class="text-center">
                  No Data Found
              </td>
            </tr>

            @endforelse

          </tbody>
        </table>
      </div>
    
    </div>



    </div>
  </div>
</div>
@endsection