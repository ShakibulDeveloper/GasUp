@extends('layouts.customer_details')
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
                  <span><b>customers overview ></b> customer details</span>
                  <h3>Customer Details</h3>
              </div>
              <div class="clr"></div>
              <div class="data-table">
                  <div class="user-profile">
                      <div class="user-img">
                          <img src="{{ asset('public/frontend_assets/images/user.jpg') }}" alt="user-img" width="100">
                      </div>
                      <div class="user-text">
                          <h3>{{ $user->username }}</h3>
                          <p>{{ $user->address }}</p>
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
                      <div class="colume co-colume customer_dev">
                          <span>Status</span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="colume dd-colume">
                        @forelse ($get_user_orders as $get_user_order)
                          <p>{{ $get_user_order->date }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume t-colume">
                        @forelse ($get_user_orders as $get_user_order)
                          <p>{{ $get_user_order->time }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume">
                        @forelse ($get_user_orders as $get_user_order)
                          <p>{{ $get_user_order->courier }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume innerpage-ac increase-c">
                        @forelse ($get_user_orders as $get_user_order)
                          <p>{{ Str::limit($get_user_order->address, 20, $end="...") }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume dd-colume">
                        @forelse ($get_user_orders as $get_user_order)
                          <p>{{ $get_user_order->tank }} {{ $get_user_order->product_name }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume dd-colume q-colume">
                        @forelse ($get_user_orders as $get_user_order)
                          <p>{{ $get_user_order->quantity }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume dd-colume">
                        @forelse ($get_user_orders as $get_user_order)

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
                        @forelse ($get_user_orders as $get_user_order)
                          <p>#{{ $get_user_order->id }}</p>
                        @empty
                          <p>no data</p>
                        @endforelse
                      </div>
                      <div class="colume a-colume">
                        @forelse ($get_user_orders as $get_user_order)
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
                  <a href="{{ url('customer/details/all') }}/{{ $user_id }}" class="view_all">view all <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </div>
              <div class="clr"></div>
              <div class="order-title fp-padding">

              </div>
              <div class="order-status stock-item dev_fix_height co-mar-top2 diff-linebar">
                  <h5 class="fix-mar">Frequently Bought Brands</h5>
                  <div class="dropdown-main">
                    <div class="stock_dev_pos2">
                      <span>Today</span>
                      <div class="dropdown">
                          <button class="dropbtn"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                          <div class="dropdown-content">
                              <a href="#">Yesterday</a>
                              <a href="#">1 week</a>
                              <a href="#">1 month</a>
                          </div>
                      </div>
                    </div>
                      <div class="line-graph">
                        <canvas id="barChart2" class="customer_overview_bar2" width="200" height="200"></canvas>
                          {{-- <barchart data-legend="Legend">
                              <bar data-value="1" data-label="Mira Gas" data-group="1"></bar>
                              <bar data-value="2" data-label="Petronas" data-group="2"></bar>
                              <bar data-value="3" data-label="Petron" data-group="3"></bar>
                              <bar data-value="4" data-label="BHP" data-group="4"></bar>
                              <bar data-value="5" data-label="Solar Gas" data-group="5"></bar>
                              <bar data-value="6" data-label="My Gaz" data-group="6"></bar>
                          </barchart> --}}
                          {{-- <div class="mark-line ml1"></div>
                          <div class="mark-line ml2"></div>
                          <div class="mark-line ml3"></div>
                          <div class="mark-line ml4"></div>
                          <div class="mark-line ml5"></div> --}}
                          {{-- <div class="number-data">
                              <p>4000</p>
                              <p>3000</p>
                              <p>2000</p>
                              <p>1000</p>
                              <p class="zero">0</p>
                          </div> --}}
                      </div>
                  </div>
              </div>
              <div class="order-status dev_fix_height bottom-os-mar margin-b">
                  <h5>Gas Tank Size</h5>
                  <div class="dropdown-main">
                      <span>Today</span>
                      <div class="dropdown">
                          <button class="dropbtn"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                          <div class="dropdown-content">
                              <a href="#">Yesterday</a>
                              <a href="#">1 week</a>
                              <a href="#">1 month</a>
                          </div>
                      </div>
                  </div>
                  <div class="circle-graph one_customer_chart">
                    @if (!empty($most_purchased_product))

                      <canvas id="oilChart2" class="" width="380" height="380"></canvas>
                      <div class="pie-order2">
                        @php
                        $tank1_percentage = ($tank1/$get_user_orders_all->count())*100;
                        $tank2_percentage = ($tank2/$get_user_orders_all->count())*100;
                        $tank3_percentage = ($tank3/$get_user_orders_all->count())*100;
                        @endphp
                        <h6>{{ round($tank1_percentage, 2) }}</h6>
                        <span>14KG ({{ $tank1 }})</span>
                      </div>
                      @else
                        <div class="span-txt">
                            <span>No data to show....</span><br>
                            <span>No data to show....</span>
                        </div>
                    @endif

                  </div>

                  <div class="circle-data">
                      <div class="cd1 cd-txt">
                          <p>14KG / <br> <b>{{ $tank1 }}</b></p>
                      </div>
                      <div class="cd2 cd-txt">
                          <p>12KG / <br> <b>{{ $tank2 }}</b></p>
                      </div>
                      <div class="cd2 cd-txt">
                          <p>10KG / <br> <b>{{ $tank3 }}</b></p>
                      </div>
                  </div>
              </div>
              <div class="clr"></div>
              <div class="order-status bottom-os-mar margin-b most-per">
                  <h6>Most frequent purchase</h6>
                  @if (!empty($most_purchased_product))
                    <h3>{{ $most_purchased_product2 }}</h3>
                    <h3>{{ $most_purchased_product }}</h3>
                    <div class="span-txt">
                        <span>{{ $most_purchased_product2 }}: {{ $most_purchased_product2_times }} times</span><br>
                        <span>{{ $most_purchased_product }}: {{ $most_purchased_product_times }} times</span>
                    </div>

                    @else
                      <h3>No Purchase Yet</h3>
                        <h3>Zero</h3>
                      <div class="span-txt">
                          <span>No data to show....</span><br>
                          <span>No data to show....</span>
                      </div>
                  @endif

              </div>
              <div class="order-status">
                  <h5>Report Overview</h5>
                  <div class="dropdown-main">
                      <span>Today</span>
                      <div class="dropdown">
                          <button class="dropbtn"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                          <div class="dropdown-content">
                              <a href="#">Yesterday</a>
                              <a href="#">1 week</a>
                              <a href="#">1 month</a>
                          </div>
                      </div>
                  </div>
                  <div class="circle-graph one_customer_chart">

                    @if (!empty($most_purchased_product))
                      <canvas id="oilChart" class="" width="380" height="380"></canvas>
                      @php
                      $order_percentage = ($order_cancel/$get_user_orders_all->count())*100;
                      $accept_percentage = 100 - round($order_percentage, 2);
                      @endphp
                      <div class="pie-order2">
                        <h6>{{ round($order_percentage, 2) }}%</h6>
                        <span>Incorrect/ <br>Inauthentic order</span>
                      </div>
                      @else
                        <div class="span-txt">
                            <span>No data to show....</span><br>
                            <span>No data to show....</span>
                        </div>
                    @endif
                  </div>
                  <div class="circle-data">
                      <div class="cd1 cd-txt">
                          <p>Incorrect/ <br> Inauthentic order</p>
                      </div>
                      <div class="cd2 cd-txt">
                          <p>Offensive behaviour</p>
                      </div>
                      <div class="cd2 cd-txt">
                          <p>Suspicious account/ <br> Fraud</p>
                      </div>
                      <div class="cd2 cd-txt">
                          <p>Others</p>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Dashboard ends -->
@endsection

@section('customer_chart')
  <script>
  var oilCanvas = document.getElementById("oilChart");

  Chart.defaults.global.defaultFontFamily = "aria";
  Chart.defaults.global.defaultFontSize = 18;
  Chart.defaults.global.legend.display = false;

  var oilData = {
    labels: [
        "Incorrect (%)",
        "Correct(%)"
    ],
  datasets: [
      {
        <?php
          if (!empty($most_purchased_product)) {

        ?>
        data: [{{ round($order_percentage,2) }}, {{ $accept_percentage }}],
        <?php
        }
        ?>
        backgroundColor: [
            "#17bf83",
            "#65e59e"

          ]
      }]
  };

    var pieChart = new Chart(oilCanvas, {
    type: 'pie',
    data: oilData
  });

  var oilCanvas = document.getElementById("oilChart2");

  Chart.defaults.global.defaultFontFamily = "aria";
  Chart.defaults.global.defaultFontSize = 18;
  Chart.defaults.global.legend.display = false;

  var oilData = {
    labels: [
      "14KG Gas Tank (%)",
      "12KG Gas Tank (%)",
      "10KG Gas Tank (%)"
    ],
  datasets: [
      {
        <?php
          if (!empty($most_purchased_product)) {

        ?>
        data: [{{ round( $tank1_percentage ,2) }}, {{ round( $tank2_percentage ,2) }},{{ round( $tank3_percentage ,2) }}],
        <?php
        }
        ?>
        backgroundColor: [
            "#17bf83",
            "#65e59e",
            "#008d62",

          ]
      }]
  };

    var pieChart = new Chart(oilCanvas, {
    type: 'pie',
    data: oilData
  });

  Chart.defaults.global.legend.display = false;
  var ctx = document.getElementById("barChart2").getContext('2d');
  var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Mira Gas", "Petronas", "Petron", "BHP", "Solar Gas", "My Gaz"],
      datasets: [
        {
        data: [
          {{ $graph_product1->quantity }},
          {{ $graph_product2->quantity }},
          {{ $graph_product3->quantity }},
          {{ $graph_product4->quantity }},
          {{ $graph_product5->quantity }},
          {{ $graph_product6->quantity }}
        ],
        backgroundColor: "#17bf83",
      },
    ]
  },

    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }

  });

  </script>
@endsection
