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
          <h3>Gas Orders</h3>
      </div>
      <div class="active-order">
          <h5>Active Orders Now</h5>
          <h4>{{ $orders->count() }}</h4>
          <p>updated at: {{ $last->time }}</p>
      </div>
      <div class="order-status">
          <h5>Order Status</h5>
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
          <div class="circle-graph">
            <canvas id="oilChart" width="380" height="380"></canvas>
            @php
              $total_orders = $orders->count();
              $total_orders_accept = $active_orders->count();
              $order_percentage = ($total_orders_accept/$total_orders)*100;
              $cancel_percentage = 100 - round($order_percentage, 2);
            @endphp
              <div class="pie-order">
                <h6>{{ round($order_percentage, 2) }}%</h6>
                <span>Accepted orders</span>
              </div>
          </div>
          <div class="circle-data">
              <div class="cd1 cd-txt">
                  <p>Accepted Orders</p>
                  @if (!empty($active_orders))
                    <span>{{ $active_orders->count() }}</span>
                    @else
                      <span>0</span>
                  @endif

              </div>
              <div class="cd2 cd-txt">
                  <p>Canceled Orders</p>
                  @if (!empty($cancel_orders))
                    <span>{{ $cancel_orders->count() }}</span>
                    @else
                      <span>0</span>
                  @endif
              </div>
          </div>
      </div>
      <div class="order-status stock-item">
          <h5>Stock</h5>
          <div class="stock_dev_pos">
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
          <div class="dropdown-main">
              <canvas id="barChart" width="200" height="200"></canvas>
              {{-- <div class="line-graph">
                  <barchart data-legend="Legend">
                      <bar data-value="1" data-label="Mira Gas" data-group="1"></bar>
                      <bar data-value="2" data-label="Petronas" data-group="2"></bar>
                      <bar data-value="3" data-label="Petron" data-group="3"></bar>
                      <bar data-value="4" data-label="BHP" data-group="4"></bar>
                      <bar data-value="5" data-label="Solar Gas" data-group="5"></bar>
                      <bar data-value="6" data-label="My Gaz" data-group="6"></bar>
                  </barchart>
                  <div class="mark-line ml1"></div>
                  <div class="mark-line ml2"></div>
                  <div class="mark-line ml3"></div>
                  <div class="mark-line ml4"></div>
                  <div class="mark-line ml5"></div>
                  <div class="number-data">
                      <p>4000</p>
                      <p>3000</p>
                      <p>2000</p>
                      <p>1000</p>
                      <p class="zero">0</p>
                  </div>
              </div> --}}
          </div>
      </div>
      <div class="clr"></div>
      <div class="data-table">
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
                @foreach ($latest_four_orders as $order)
                  <p>{{ $order->date }}</p>
                @endforeach
              </div>
              <div class="colume t-colume">
                @foreach ($latest_four_orders as $order)
                  <p>{{ $order->time }}</p>
                @endforeach
              </div>
              <div class="colume">
                @foreach ($latest_four_orders as $order)
                  <p>{{ $order->username }}</p>
                @endforeach
              </div>
              <div class="colume">
                @foreach ($latest_four_orders as $order)
                  <p>{{ $order->courier }}</p>
                @endforeach
              </div>
              <div class="colume a-colume">
                @foreach ($latest_four_orders as $order)
                  <p>{{ Str::limit($order->address, 35, $end='...') }}</p>
                @endforeach
              </div>
              <div class="colume o-colume">
                @foreach ($latest_four_orders as $order)
                  <p>#{{ $order->_id }}</p>
                @endforeach
              </div>
              <div class="colume dev-a">
                  <ul>
                    @foreach ($latest_four_orders as $order)
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
                      @endif
                    @endforeach
                  </ul>
              </div>
          </div>
          <div class="clr"></div>
          <a href="{{ route('all_orders') }}" class="view_all">view all <i class="fa fa-angle-right" aria-hidden="true"></i></a>
      </div>
  </div>
  <!-- Dashboard ends -->
@endsection

@section('pie_chart')
  <script type="text/javascript">
  var oilCanvas = document.getElementById("oilChart");

  Chart.defaults.global.defaultFontFamily = "aria";
  Chart.defaults.global.defaultFontSize = 18;
  Chart.defaults.global.legend.display = false;

  var oilData = {
    labels: [
        "Accepted (%)",
        "Cancelled (%)"
    ],
  datasets: [
      {
        data: [{{ round($order_percentage, 2) }}, {{ $cancel_percentage }}],
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

  var ctx = document.getElementById("barChart").getContext('2d');
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
