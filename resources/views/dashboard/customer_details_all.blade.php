@extends('layouts.customer_details')
@section('dashboard')

  <div class="cdetails2">


  <!-- Dashboard start -->
  <div class="dashboard-container">
      <div class="search-bar">
          <form action="">
              <input type="text" placeholder="search order ID, ongoing orders, customer details...">
              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
      </div>
      <div class="order-title">
          <span><b>customers overview ></b> customer details > recent orders</span>
          <h3>Customer Details</h3>
      </div>
      <div class="clr"></div>
      <div class="data-table">
          <div class="user-profile">
              <div class="user-img">
                  <img src="{{ asset('frontend_assets/images/user.jpg') }}" alt="user-img" width="100">
              </div>
              <div class="user-text">
                  <h3>{{ $user->username }}</h3>
                  <p>{{ $user->address  }}</p>
              </div>
              <div class="user-btn">
                  <div class="ub1">
                      <p>Phone Number</p>
                      <span>{{ $user->phone }}</span>
                  </div>
                  <div class="ub2">
                      <p>Email</p>
                      <span>{{ $user->email }}</span>
                  </div>
                  <div class="clr"></div>
              </div>
              <div class="clr"></div>
          </div>
          <span class="table-name">Recent Delivery</span>
          <div class="row">
              <div class="colume dd-colume">
                  <span>Date</span>
              </div>
              <div class="colume t-colume">
                  <span>Time</span>
              </div>
              <div class="colume c-colume">
                  <span>Courier name</span>
              </div>
              <div class="colume co-colume innerpage-ac increase-c">
                  <span>Address</span>
              </div>
              <div class="colume co-colume">
                  <span>Order Details</span>
              </div>
              <div class="colume co-colume q-colume">
                  <span>Quantity</span>
              </div>
              <div class="colume co-colume">
                  <span>Price</span>
              </div>
              <div class="colume co-colume">
                  <span>Order ID</span>
              </div>
              <div class="colume co-colume">
                  <span>Status</span>
              </div>
          </div>
          <div class="row">
              <div class="colume dd-colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>{{ $get_user_order->date }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume t-colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>{{ $get_user_order->time }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>{{ $get_user_order->courier }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume innerpage-ac increase-c">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>{{ Str::limit($get_user_order->address, 20, $end="...") }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume dd-colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>{{ $get_user_order->tank }} {{ $get_user_order->product_name }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume dd-colume q-colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>{{ $get_user_order->quantity }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume dd-colume">
                @forelse ($get_user_orders_all as $get_user_order)

                    @if ($get_user_order->product_name == "Mira Gas")
                      <p>RM {{ ($get_user_order->quantity)*2 }}</p>
                    @endif
                    @if ($get_user_order->product_name == "Petronas")
                    <p>RM {{ ($get_user_order->quantity)*4 }}</p>
                    @endif
                    @if ($get_user_order->product_name == "Petron")
                      <p>RM {{ ($get_user_order->quantity)*5 }}</p>
                    @endif
                    @if ($get_user_order->product_name == "BHP")
                    <p>RM {{ ($get_user_order->quantity)*7 }}</p>
                    @endif
                    @if ($get_user_order->product_name == "Solar Gas")
                      <p>RM {{ ($get_user_order->quantity)*6 }}</p>
                    @endif
                    @if ($get_user_order->product_name == "My Gaz")
                      <p>RM {{ ($get_user_order->quantity)*2 }}</p>
                    @endif
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume dd-colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  <p>#{{ $get_user_order->id }}</p>
                @empty
                  <p>no data</p>
                @endforelse
              </div>
              <div class="colume a-colume">
                @forelse ($get_user_orders_all as $get_user_order)
                  @if ($get_user_order->status == 1)
                    <a href="#" class="changeCustomerBtn">In Delivery</a>
                  @endif
                  @if ($get_user_order->status == 2)
                    <a href="#" class="changeCustomerBtn red-btn">Cancelled</a>
                  @endif
                  @if ($get_user_order->status == 3)
                    <a href="#" class="changeCustomerBtn delivered-btn">Delivered</a>
                  @endif
                @empty
                  <p>no data</p>
                @endforelse
              </div>
          </div>
          <div class="clr"></div>
      </div>
      <div class="clr"></div>
  </div>
  <!-- Dashboard ends -->
  </div>
@endsection
