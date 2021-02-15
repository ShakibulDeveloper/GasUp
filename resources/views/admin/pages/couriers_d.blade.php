@extends('admin.layouts.master')
@section('content')

<!-- {{showFlash()}} -->

<div class="col-sm-9 right_contents">
  <div class="main_inner_content">
    @include('component.search')
    <div class="bredcrums">
      <ul>
        <li><a href="#" class="<?php echo (isset($active) && $active == 'courier_overview') ? 'active':''; ?>">Couriers Overview</a></li>
        <li><a href="#" ><i class="fa fa-angle-right"></i></a></li>
        <li><a href="#" class="<?php echo (isset($active) && $active == 'courier_details') ? 'active':''; ?>">Couriers Details</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-sm-6 Details_Box">
        <div class="main_heading">
          <h3>Couriers Details</h3>
        </div>
      </div>

    </div>

    <div class="profile_box padd_btm">
      <div class="row">
        <div class="col-sm-6 profile_left">
          <img src="{{asset('public/uploads/'.$single_courier->passport_back)}}">
          <h4>{{isset($single_courier->first_name) ? $single_courier->first_name:''}} {{isset($single_courier->last_name) ? $single_courier->last_name:'Liew Yi Xian'}}</h4>
          <ul>
            <li><a href="#"><i class="fa fa-star"></i></a></li>
            <li><a href="#"><i class="fa fa-star"></i></a></li>
            <li><a href="#"><i class="fa fa-star"></i></a></li>
            <li><a href="#"><i class="fa fa-star"></i></a></li>
            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
          </ul>
          <p>Validated <i class="fa fa-check"></i></p>
        </div>
        <div class="col-sm-6 profile_right" id="input_box">
          <ul>
            <li>
              <div class="form_box">
                <label>My Card Passport</label>
                <input type="text" placeholder="{{isset($single_courier->passport)?$single_courier->passport:'0000000-00-000'}}" name="">
              </div>
            </li>
            <li>
              <div class="form_box">
                <label>Phone Number</label>
                <input type="text" placeholder="{{isset($single_courier->mobile_number)?$single_courier->mobile_number:'024569854'}}" name="">
              </div>
            </li>
            <li>
              <div class="form_box">
                <label>Email</label>
                <input type="text" placeholder="{{isset($single_courier->email)?$single_courier->email:'info@gamil.com'}}" name="">
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="table_box padd_none">
        <h4>Recent Delivery</h4>
        <div class="table-responsive">
          <table class="datatable table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Order Details</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order ID</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

              @foreach(deliveries($single_courier->_id) as $delivery)
              <tr>
                <td>{{isset($delivery->created_at) ? date('d/m/Y',strtotime($delivery->created_at)):''}}</td>
                <td>{{isset($delivery->created_at) ? date('H:i a',strtotime($delivery->created_at)):''}}</td>
                <td>{{isset($delivery->name) ? $delivery->name:''}} </td>
                <td>{{isset($delivery->address) ? $delivery->address:''}}</td>
                <td>{{isset($delivery->gas) ? $delivery->gas:''}}</td>
                <td>{{isset($delivery->litre) ? $delivery->litre:''}}</td>
                <td>{{isset($delivery->price) ? $delivery->price:''}}</td>
                <td>{{isset($delivery->order_id) ? $delivery->order_id:''}}</td>
                <td><a href="{{route('courier_detail')}}/{{isset($delivery->_id) ? $delivery->_id:''}}" class="delivered_btn">Delivered</a></td>
              </tr>
              @endforeach

              <!--
                <tr>
                  <td>01/01/2020</td>
                  <td>2:20 PM</td>
                  <td>Asad khalid</td>
                  <td>Block no 5 jauharabad</td>
                  <td></td>
                  <td>2</td>
                  <td></td>
                  <td>#12545</td>
                  <td><a class="delivered_btn" href="#">Delivered</a></td>
                </tr>
              -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row graphbox multigraphbox">
      <div class="col-sm-3 card_pasport">
        <div class="inner_card frequernt_box">
          <p>Most frequernt Sales</p>
          <b>14KG <span>Mira Gas</span></b>
          <span style="color:#666;">14KG Gas: 200 Tanks</span><br>
          <span style="color:#666;">Mira Gas: 100 Tanks</span>
        </div>
      </div>
      <div class="col-sm-5 card_pasport">
        <div class="inner_card">
          <p>
            <b>Frequently Stocked Brands</b>

          </p>
          <!-- <img src="{{asset('assets/images/graph852.jpg')}}"> -->
          {{-- <div id="courierChartContainer" style="height: 300px; width: 100%;"></div> --}}
          <div id="bar_canvasjs" style="height: 300px; width: 100%;"></div>
          <div class="calander">
            <p>Today <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 card_pasport">
        <div class="inner_card">
          <p><b>Gas Tank Size</b></p>
          <!-- <img src="{{asset('assets/images/Untitled-1_05.jpg')}}"> -->
          {{-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> --}}
          <div class="graphCircle text-center">
            <h2><b>100%</b></h2>
            <span>14KG (200)</span>
          </div>

          <div class="graphInfo">
            <div class="small_dot sd">
                <h3>14KG</h3>
                <h3>200</h3>
            </div>
            <div class="small_dot sd">
                <h3>12KG</h3>
                <h3>0</h3>
            </div>
            <div class="small_dot sd">
                <h3>10KG</h3>
                <h3>0</h3>
            </div>
          </div>
          <div class="calander">
            <p>Today <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
          </div>
        </div>
      </div>
    </div>


    <div class="row graphbox">
      <div class="col-sm-6 card_pasport">
        <div class="inner_card">
          <p>
            <b>Ratings</b>
          </p>
          <!-- <img src="{{asset('assets/images/graph125.jpg')}}"> -->
          {{-- <div id="courierChartContainer2" style="height: 300px; width: 100%;"></div> --}}

          <div class="graphCircle graphCircle2  text-center">
            <div class="mt-5">
              <h4><b>5/5</b></h4>
              <h4>Stars</h4>
            </div>
          </div>
          <div class="graphInfo graphInfo2">
            <div class="small_dot sd">
                <h3>5/5</h3>
            </div>
            <div class="small_dot sd">
              <h3>4/5</h3>
            </div>
            <div class="small_dot sd">
              <h3>3/5</h3>
            </div>
            <div class="small_dot sd">
              <h3>2/5</h3>
            </div>
            <div class="small_dot sd">
              <h3>1/5</h3>
            </div>
          </div>
          <div class="calander">
            <p>Today <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 card_pasport">
        <div class="inner_card">
          <p><b>Report Frequency</b></p>
          <!--  <img src="{{asset('assets/images/graph-789.jpg')}}"> -->

          {{-- <div id="tabs" style="height: 360px">
            <ul>
              <li ><a href="#tabs-1" style="font-size: 12px">Spline</a></li>
              <li ><a href="#tabs-2"  style="font-size: 12px">Spline Area</a></li>
            </ul>
            <div id="tabs-1" style="height: 300px">
              <div id="courierChartContainer3" style="height: 300px; width: 100%;"></div>
            </div>
            <div id="tabs-2" style="height: 300px">
              <div id="courierChartContainer4" style="height: 300px; width: 100%;"></div>
            </div>
          </div> --}}
              <div id="lineGraph" style="height: 400px; width: 500px"></div>
              <div class="calander">
                <p>Today <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
              </div>
        </div>
      </div>
    </div>


  </div>
</div>
@endsection

@section('js')

<script>


var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'lineGraph',
    marginBottom: 80,
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels: {
      rotation: 90
    }
  },

  series: [{
    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
  }]
});



window.onload = function () {

var chart = new CanvasJS.Chart("bar_canvasjs", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
  backgroundColor: "#f6f6f6",
	data: [{
		type: "column",
    color: "#17bf83",
		yValueFormatString: "#,##0.0#\"%\"",
		dataPoints: [
			{ label: "Mira Gas", y: 7.1 },
			{ label: "Petrones", y: 6.70 },
			{ label: "Petron", y: 5.00 },
			{ label: "BHP", y: 2.50 },
			{ label: "Solar Gas", y: 2.30 },
			{ label: "My Gaz", y: 1.80 },

		]
	}]
});
chart.render();

}

</script>

@endsection
