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
              <span>customers overview</span>
              <h3>Customers</h3>
          </div>
          <div class="clr"></div>
          <div class="data-table">
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
                      <p>{{ Str::limit($user->address, 35, $end="...") }}</p>
                    @endforeach
                  </div>
                  <div class="colume a-colume">
                    @foreach ($users as $user)
                      <a href="{{ url('customer/details') }}/{{ $user->id }}">view details <i class="fa fa-angle-right"></i></a>
                    @endforeach
                  </div>
              </div>
              <div class="clr"></div>
              <a href="{{ route('all_customer') }}" class="view_all">view all <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </div>
          <div class="gas_up_sale">
              <h3>Gas Up Sales</h3>
              <div class="line-graph">
                <canvas id="barChart" class="barChart2" width="200" height="200"></canvas>
                  {{-- <barchart data-legend="Legend">
                      <bar data-value="1" data-label="12 PM" data-group="1"></bar>
                      <bar data-value="2" data-label="1 PM" data-group="2"></bar>
                      <bar data-value="3" data-label="2 PM" data-group="3"></bar>
                      <bar data-value="2" data-label="3 PM" data-group="2"></bar>
                      <bar data-value="5" data-label="4 PM" data-group="5"></bar>
                      <bar data-value="6" data-label="5 PM" data-group="5"></bar>
                      <bar data-value="7" data-label="6 PM" data-group="6"></bar>
                  </barchart>
                  <div class="mark-line ml1"></div>
                  <div class="mark-line ml2"></div>
                  <div class="mark-line ml3"></div>
                  <div class="mark-line ml4"></div>
                  <div class="mark-line ml5"></div>
                  <div class="number-data">
                      <p>4K</p>
                      <p>3K</p>
                      <p>2K</p>
                      <p>1K</p>
                      <p class="zero">0</p>
                  </div> --}}
                  <div class="clr"></div>
                  <div class="drop-main">
                      <div class="dropdown">
                          <span>Today</span>
                          <button class="dropbtn"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                          <div class="dropdown-content">
                              <a href="#">Yesterday</a>
                              <a href="#">1 week</a>
                              <a href="#">1 month</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="order-title co-mar-top">
              <h3>Customer Reports</h3>
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
              @php
                $total_orders = $orders->count();
                $total_orders_accept = $active_orders->count();
                $order_percentage = ($total_orders_accept/$total_orders)*100;
                $cancel_percentage = 100 - round($order_percentage, 2);

                $tank1_orders = $tank_size1->count();
                $tank2_orders = $tank_size2->count();
                $tank3_orders = $tank_size3->count();
                $tank1_percentage = ($tank1_orders/$total_orders)*100;
                $tank2_percentage = ($tank2_orders/$total_orders)*100;
                $tank3_percentage = ($tank3_orders/$total_orders)*100;
              @endphp
              <div class="circle-graph">
                <canvas id="oilChart" width="380" height="380"></canvas>
                <div class="pie-order2">
                  <h6>{{ $cancel_percentage }}%</h6>
                  <span>Incorrect/ <br>Inauthentic order</span>
                </div>
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
          <div class="order-status or-nobg">
              <h5>Report frequency</h5>
              <div class="dropdown-main">
                  <span>Jan-june 2020</span>
                  <div class="dropdown">
                      <button class="dropbtn"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                      <div class="dropdown-content">
                          <a href="#">Yesterday</a>
                          <a href="#">1 week</a>
                          <a href="#">1 month</a>
                      </div>
                  </div>
              </div>
              <div id="simpleLine"></div>
          </div>
          <div class="clr"></div>
          <div class="order-title fp-padding">
              <h3>Frequent Purchases</h3>
          </div>
          <div class="order-status dev-mb stock-item co-mar-top2 diff-linebar">
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
                  <canvas id="barChart2" class="customer_overview_bar2" width="200" height="200"></canvas>
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
          <div class="order-status dev-mb bottom-os-mar margin-b">
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
              <div class="circle-graph">
                <canvas id="oilChart2" width="380" height="380"></canvas>
                <div class="pie-order2">
                  <h6>{{ round($tank1_percentage,2) }}%</h6>
                  <span>14KG ({{ $tank_size1->count() }})</span>
                </div>
              </div>
              <div class="circle-data">
                  <div class="cd1 cd-txt">
                      <p>14KG / <br> <b>{{ $tank_size1->count() }}</b></p>
                  </div>
                  <div class="cd2 cd-txt">
                      <p>12KG / <br> <b>{{ $tank_size2->count() }}</b></p>
                  </div>
                  <div class="cd2 cd-txt">
                      <p>10KG / <br> <b>{{ $tank_size3->count() }}</b></p>
                  </div>
              </div>
          </div>
      </div>
      <!-- Dashboard ends -->
    @endsection

    @section('customer_overview')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="https://code.angularjs.org/1.2.21/angular.js"></script>
      <script src="https://code.highcharts.com/highcharts.src.js"></script>
    @endsection
    @section('customer_chart')
      <script>
          var chart = new Highcharts.Chart({
              chart: {
                  renderTo: 'simpleLine',
                  marginBottom: 90,
              },
              xAxis: {
                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                  labels: {
                      rotation: 90
                  }
              },

              series: [{
                  data: [{{ $graph_product1->quantity }}, {{ $graph_product2->quantity }}, {{ $graph_product3->quantity }}, {{ $graph_product4->quantity }}, {{ $graph_product5->quantity }}, {{ $graph_product6->quantity }}]
              }]
          });

          Chart.defaults.global.legend.display = false;
          var ctx = document.getElementById("barChart").getContext('2d');
          var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ["{{ $graph_product1->time }}", "{{ $graph_product2->time }}", "{{ $graph_product3->time }}", "{{ $graph_product4->time }}","{{ $graph_product5->time }}","{{ $graph_product6->time }}"],
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

          var oilCanvas = document.getElementById("oilChart");

          Chart.defaults.global.defaultFontFamily = "aria";
          Chart.defaults.global.defaultFontSize = 18;
          Chart.defaults.global.legend.display = false;

          var oilData = {
            labels: [
                "Incorrect (%)",
                "Correct (%)"
            ],
          datasets: [
              {
                data: [{{ $cancel_percentage }}, {{ round($order_percentage, 2) }}],
                backgroundColor: [
                    "#65e59e",
                    "#17bf83"
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
                data: [{{ $tank1_orders }}, {{ $tank2_orders }},{{ $tank3_orders }}],
                backgroundColor: [
                    "#65e59e",
                    "#17bf83",
                    "#008d62"
                  ]
              }]
          };

            var pieChart = new Chart(oilCanvas, {
            type: 'pie',
            data: oilData
          });

      </script>

    @endsection
