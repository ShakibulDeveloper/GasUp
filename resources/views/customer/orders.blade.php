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
              <th>Gas</th>
              <th>Litre</th>
              <th>Price</th>
              <th>Status</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>

            @forelse($orders as $order)
            <tr>
              <td><span class="red"></span>{{  $order->gas }}</td>
              <td>{{  $order->litre }}</td>
              <td>{{  $order->price }}</td>
              <td>{{  $order->payment_status }}</td>
              <td>{{  $order->created_at }}</td>
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