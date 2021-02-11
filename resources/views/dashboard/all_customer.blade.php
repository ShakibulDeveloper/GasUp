@extends('layouts.customer')
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
                  <span><b>customer ></b> customer accounts</span>
                  <h3>Customers</h3>
              </div>
              <div class="clr"></div>
              <div class="data-table fix-height2">
                  <span class="table-name">Customer Account</span>
                  <div class="filter">
                      <span>Sort by:</span>
                      <select id="select">
                          <option value="1">All Customers</option>
                          <option value="2">New Customers</option>
                          <option value="3">Blocked</option>
                          <option value="4">Others</option>
                      </select>
                  </div>
                  <div class="row">
                      <div class="colume dd-colume">
                          <span>Account Name</span>
                      </div>
                      <div class="colume t-colume">
                          <span>Phone Number</span>
                      </div>
                      <div class="colume c-colume">
                          <span>Email</span>
                      </div>
                      <div class="colume co-colume innerpage-ac">
                          <span>Address</span>
                      </div>
                      <div class="colume co-colume">
                          <span>status</span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="colume dd-colume">
                        @foreach ($users as $user)
                            <p>{{ $user->username }}</p>
                        @endforeach

                      </div>
                      <div class="colume t-colume">
                        @foreach ($users as $user)
                            <p>{{ $user->phone }}</p>
                        @endforeach
                      </div>
                      <div class="colume">
                        @foreach ($users as $user)
                            <p>{{ $user->email }}</p>
                        @endforeach
                      </div>
                      <div class="colume innerpage-ac">
                        @foreach ($users as $user)
                            <p>{{ Str::limit($user->address,35,$end="...") }}</p>
                        @endforeach

                      </div>
                      <div class="colume a-colume">
                        @foreach ($users as $user)
                          <a href="{{ url('customer/details') }}/{{ $user->id }}">view details <i class="fa fa-angle-right"></i></a>
                        @endforeach
                      </div>
                  </div>
                  <div class="clr"></div>
              </div>
          </div>
          <!-- Dashboard ends -->
@endsection
