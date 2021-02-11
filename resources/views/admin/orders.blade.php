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
        <li><a href="#" class="active">Orders</a></li>
      </ul>
    </div>
    <div class="main_heading">
      <h3>Orders</h3>
    </div>
    <div class="sort_by">
     
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
                No Data Found
            </tr>

            @endforelse

          </tbody>
        </table>
      </div>
    
    </div>
  </div>
</div>
@endsection