<!DOCTYPE html>
<!--<![endif]-->
<head xmlns:ng="https://angularjs.org">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Gas Up</title>
	<link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
	<link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link type="text/css" rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/plugins/datatable/dataTables.bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('assets/plugins/datatable/responsive.bootstrap.min.css')}}" type="text/css">
	<link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
	<style>
	  .ui-tabs-anchor {
	    outline: none;
	  }
		.canvasjs-chart-credit,.highcharts-axis-title,.highcharts-point,.highcharts-title{
			opacity: 0;
		}
		.highcharts-background{
			fill: #f6f6f6;
		}
		.highcharts-graph {
			stroke: #259975;
		}
		.graphCircle{
			width: 240px;
			height: 240px;
			border: 40px solid #17bf83;
			border-radius: 50%;
		}
		.graphCircle h2 {
			font-size: 28px;
			padding-top: 50px;
		}
		.small_dot{
			margin-bottom: 20px;
		}
		.graphInfo {
		position: absolute;
		right: 25px;
		bottom: 65px;
		}
		.sd{
			position: relative;
		}
		.sd::after {
			position: absolute;
			content: '';
			top: 0;
			left: -26px;
			width: 15px;
			height: 15px;
			background: #17bf83;
			border-radius: 50%;
		}
	</style>
</head>
<body id="page-name">

	<div class="main_wrap">
		<div class="menu_btn">
			<i class="fa fa-bars"></i>
		</div>
		<div class="col-sm-3 left_sidebar">
			<div class="close_icon">
				<i class="fa fa-close"></i>
			</div>
			<div class="main_logo">
				<img src="{{asset('assets/images/logo.png')}}">
			</div>
			<div class="main_nav">
				<ul>
					@can('Admin')
					<li>
						<a href="{{route('sale')}}" class="<?php echo (isset($gas_up_sales) && $gas_up_sales == 'active') ? 'active':'' ?>">
							<img src="{{asset('assets/images/Vector.png')}}">
						 Gas Up Sales
						</a>
					</li>

					<li>
						<a href="{{ route('order_overall') }}" class="<?php echo (isset($order) && $order == 'active') ? 'active':'' ?>">
							<img src="{{asset('assets/images/Vector2.png')}}">
							 Orders
						</a>
					</li>

					@endcan

					@can('Customer')

					<li>
						<a href="{{ route('new_order') }}" class="{{ request()->routeIs('new_order') ? 'active' : '' }}">
							<img src="{{asset('assets/images/Vector2.png')}}">
							 New Order
						</a>
					</li>

					<li>
						<a href="{{ route('orders') }}" class="{{ request()->routeIs('orders') ? 'active' : '' }}">
							<img src="{{asset('assets/images/Vector2.png')}}">
							 Your Orders
						</a>
					</li>

					<li>
						<a href="{{ route('overview') }}" class="{{ request()->routeIs('overview') ? 'active' : '' }}">
						<img src="{{asset('assets/images/Vector3.png')}}">
							Overview
						</a>
					</li>
					<li>
						<a href="{{ route('addNewUser') }}" class="{{ request()->routeIs('apply_for_courier') ? 'active' : '' }}">
						<img src="{{asset('assets/images/Vector5.png')}}">
							Apply for Courier
						</a>
					</li>
					<li>
						<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                			 <img src="{{asset('assets/images/Vector4.png')}}"> Log Out
						</a>
		                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                    @csrf
		                </form>
					</li>

					@endcan

					@can('Admin')

					<li>
						<a href="{{ route('customer_view') }}" class="<?php echo (isset($courier_d) && $courier_d == 'active') ? 'active':'' ?>">
						<img src="{{asset('assets/images/Vector3.png')}}">
							Customer Overview

						</a>
					</li>

					<li>
						<a href="{{ route('courier_overview.index') }}" class="<?php echo (isset($courier_d) && $courier_d == 'active') ? 'active':'' ?>">
						<img src="{{asset('assets/images/Vector5.png')}}">
							Courier Overview

						</a>
					</li>

					<li>
						{{-- <a href="{{route('gas')}}" class="{{ request()->routeIs('gas') ? 'active' : '' }}">
							<img src="{{asset('assets/images/Vector5.png')}}"> Pricing
						</a> --}}
					</li>

					<li>
						<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                			 <img src="{{asset('assets/images/Vector4.png')}}"> Log Out
						</a>
		                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                    @csrf
		                </form>
					</li>

					@endcan

					@guest

					<li>
						<a href="{{ route('addNewUser') }}">
                			 <img src="{{asset('assets/images/Vector3.png')}}"> Apply For Courierman
						</a>
					</li>

					@endguest



				</ul>
			</div>
		</div>

		@yield('content')


	</div>

	<script type="text/javascript">
		var base_url='{{url('/')}}';
	</script>
	<script src="{{asset('assets/js/jquery.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
		$('.datatable').DataTable({
		    ordering:false,
		});
	</script>
	<!-- <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> -->
	<script src="https://canvasjs.com/assets/script/jquery-ui.1.11.2.min.js"></script>
	<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script src="https://code.angularjs.org/1.2.21/angular.js"></script>
	<script src="https://code.highcharts.com/highcharts.src.js"></script>
	<!-- <script src="{{asset('assets/plugins/chartJs/Chart.min.js')}}"></script> -->
	{{-- <script src="{{asset('assets/js/charts.js')}}"></script> --}}

	<script src="{{asset('assets/js/custom.js')}}"></script>

	@yield('js')

</body>
</html>
