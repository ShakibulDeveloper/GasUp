@extends('layouts.dashboard')
@section('dashboard')
  <!-- Dashboard start -->
  <div class="dashboard-container">
      <div class="search-bar">
          <form action="">
              <input type="text" placeholder="search order ID, ongoing orders, customer details...">
              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
      </div>
      <div class="order-title">
          <h3>Recent Delivaries</h3>
      </div>
      <div class="clr"></div>
      <div class="data-table fix-height">
          <span class="table-name">Recent Deliveries</span>
          <div class="filter">
              <span>Sort by:</span>
              <select id="select">
                  <option value="1">All delivery</option>
                  <option value="2">Delivered</option>
                  <option value="3">Canceled</option>
                  <option value="4">Processing</option>
              </select>
          </div>
          <div class="row">
              <div class="colume dd-colume">
                  <span>Delivery Date</span>
              </div>
              <div class="colume t-colume">
                  <span>Time</span>
              </div>
              <div class="colume c-colume">
                  <span>Customer</span>
              </div>
              <div class="colume co-colume">
                  <span>Courier</span>
              </div>
              <div class="colume a-colume">
                  <span>Address</span>
              </div>
              <div class="colume o-colume">
                  <span>Order ID</span>
              </div>
              <div class="colume s-colume dev-s">
                  <span>Status</span>
              </div>
          </div>
          <div class="row">
              <div class="colume dd-colume">
                @foreach ($orders as $order)
                  <p>{{ $order->date }}</p>
                @endforeach
              </div>
              <div class="colume t-colume">
                @foreach ($orders as $order)
                  <p>{{ $order->time }}</p>
                @endforeach
              </div>
              <div class="colume">
                @foreach ($orders as $order)
                  <p>{{ $order->username }}</p>
                @endforeach
              </div>
              <div class="colume">
                @foreach ($orders as $order)
                  <p>{{ $order->courier }}</p>
                @endforeach
              </div>
              <div class="colume a-colume">
                @foreach ($orders as $order)
                  <p>{{ Str::limit($order->address, 35, $end='...') }}</p>
                @endforeach
              </div>
              <div class="colume o-colume">
                @foreach ($orders as $order)
                  <p>#{{ $order->id }}</p>
                @endforeach
              </div>
              <div class="colume dev-a dev-at">
                  <ul>
                    @foreach ($orders as $order)
                      @if ($order->status == 1)
                        <li><a href="#">In Delivery</a></li>
                        @else
                      @endif

                      @if ($order->status == 2)
                        <li><a href="#" class="red-btn">Cancelled</a></li>
                        @else
                      @endif

                      @if ($order->status == 3)
                        <li><a href="#" class="delivered">Delivered</a></li>
                        @else
                      @endif
                    @endforeach
                  </ul>
              </div>
          </div>
          <div class="clr"></div>
      </div>
  </div>
  <!-- Dashboard ends -->
@endsection
