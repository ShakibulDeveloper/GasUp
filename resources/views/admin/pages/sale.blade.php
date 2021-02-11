@extends('admin.layouts.master')
@section('content')

    {{showFlash()}}
    
    <div class="col-sm-9 right_contents">
    <div class="main_inner_content">

		@include('component.search')
    
      
      <div class="main_heading">
        <h3>Gas Up Sales</h3>
      </div>
      
      <div class="row">

        @can('Admin')
          

        <div class="col-sm-3">
          <div class="dashboard_icon active_dash">
            <h4>Users</h4>
            <b>{{ userCount() }}</b>
       
          </div>
        </div>

        @endcan



        <div class="col-sm-3">
          <div class="dashboard_icon">
            <h4>{{ earnedCost() }}</h4>
            <b>${{ revenue() }}</b>
         
          </div>
        </div>
        <div class="col-sm-3">
          <div class="dashboard_icon">
            <h4>Orders</h4>
            <b>{{ orderCount() }}</b>
          </div>
        </div>
      </div>
      <div class="graph_box mt-5">
        <!-- <img src="{{asset('assets/images/graph-one_03.jpg')}}"> -->
        <div id="tabs_2" style="height: 360px">
          <ul>
            <li ><a href="#tabs-11" style="font-size: 12px">{{ earnedCost() }}</a></li>
            <li ><a href="#tabs-22"  style="font-size: 12px">Orders</a></li>
          </ul>
          <div id="tabs-11" style="height: 300px">
            <div class="courierChartContainer6" style="height: 300px; width: 100%;"></div>
          </div>
          <div id="tabs-22" style="height: 300px">
            <div class="courierChartContainer7" style="height: 300px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
    <script>
      window.onload = function () {

	CanvasJS.addColorSet("greenShades",
                [//colorSet Array
                "#05f58b",
                "#6fd6a8",
                "#b2ead1",
                "#39f9a3",
                "#2c885f"                
                ]);

	var options_2 = {
		animationEnabled: true,
		colorSet: "greenShades",
		data: [{
			type: "doughnut",
			innerRadius: "40%",
			showInLegend: true,
			legendText: "{label}",
			indexLabel: "{label}: #percent%",
			dataPoints: [
			{ label: "4/5 stars", y: 6492917 },
			{ label: "3/5 stars", y: 7380554 },
			{ label: "2/5 stars", y: 1610846 },
			{ label: "1/5 stars", y: 950875 }
			]
		}]
	};
	$("#courierChartContainer2").CanvasJSChart(options_2);

	var totalVisitors = 883000;
	var visitorsData = {
		"Gas Tank Size": [{
			click: visitorsChartDrilldownHandler,
			cursor: "pointer",
			explodeOnClick: false,
			innerRadius: "75%",
			legendMarkerType: "square",
			name: "Gas Tank Size",
			radius: "100%",
			showInLegend: true,
			startAngle: 90,
			type: "doughnut",
			dataPoints: [
			{ y: 519960, name: "New Visitors", color: "#39f9a3" },
			{ y: 363040, name: "Returning Visitors", color: "#2c885f" }
			]
		}],
		"New Visitors": [{
			color: "#39f9a3",
			name: "New Visitors",
			type: "column",
			xValueFormatString: "MMM YYYY",
			dataPoints: [
			{ x: new Date("1 Jan 2015"), y: 33000 },
			{ x: new Date("1 Feb 2015"), y: 35960 },
			{ x: new Date("1 Mar 2015"), y: 42160 },
			{ x: new Date("1 Apr 2015"), y: 42240 },
			{ x: new Date("1 May 2015"), y: 43200 },
			{ x: new Date("1 Jun 2015"), y: 40600 },
			{ x: new Date("1 Jul 2015"), y: 42560 },
			{ x: new Date("1 Aug 2015"), y: 44280 },
			{ x: new Date("1 Sep 2015"), y: 44800 },
			{ x: new Date("1 Oct 2015"), y: 48720 },
			{ x: new Date("1 Nov 2015"), y: 50840 },
			{ x: new Date("1 Dec 2015"), y: 51600 }
			]
		}],
		"Returning Visitors": [{
			color: "#2c885f",
			name: "Returning Visitors",
			type: "column",
			xValueFormatString: "MMM YYYY",
			dataPoints: [
			{ x: new Date("1 Jan 2015"), y: 22000 },
			{ x: new Date("1 Feb 2015"), y: 26040 },
			{ x: new Date("1 Mar 2015"), y: 25840 },
			{ x: new Date("1 Apr 2015"), y: 23760 },
			{ x: new Date("1 May 2015"), y: 28800 },
			{ x: new Date("1 Jun 2015"), y: 29400 },
			{ x: new Date("1 Jul 2015"), y: 33440 },
			{ x: new Date("1 Aug 2015"), y: 37720 },
			{ x: new Date("1 Sep 2015"), y: 35200 },
			{ x: new Date("1 Oct 2015"), y: 35280 },
			{ x: new Date("1 Nov 2015"), y: 31160 },
			{ x: new Date("1 Dec 2015"), y: 34400 }
			]
		}]
	};

	var newVSReturningVisitorsOptions = {
		colorSet: "greenShades",
		animationEnabled: true,
		theme: "light2",
		subtitles: [{
			// text: "Click on Any Segment to Drilldown",
			backgroundColor: "#2eacd1",
			fontSize: 16,
			fontColor: "white",
			padding: 5
		}],
		legend: {
			fontFamily: "calibri",
			fontSize: 14,
			itemTextFormatter: function (e) {
				return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";  
			}
		},
		data: []
	};

	var visitorsDrilldownedChartOptions = {
		colorSet: "greenShades",
		animationEnabled: true,
		theme: "light2",
		axisX: {
			labelFontColor: "#717171",
			lineColor: "#a2a2a2",
			tickColor: "#a2a2a2"
		},
		axisY: {
			gridThickness: 0,
			includeZero: false,
			labelFontColor: "#717171",
			lineColor: "#a2a2a2",
			tickColor: "#a2a2a2",
			lineThickness: 1
		},
		data: []
	};

	newVSReturningVisitorsOptions.data = visitorsData["Gas Tank Size"];
	$("#chartContainer").CanvasJSChart(newVSReturningVisitorsOptions);

	function visitorsChartDrilldownHandler(e) {
		e.chart.options = visitorsDrilldownedChartOptions;
		e.chart.options.data = visitorsData[e.dataPoint.name];
		e.chart.options.title = { text: e.dataPoint.name }
		e.chart.render();
		$("#backButton").toggleClass("invisible");
	}

	$("#backButton").click(function() { 
		$(this).toggleClass("invisible");
		newVSReturningVisitorsOptions.data = visitorsData["Gas Tank Size"];
		$("#chartContainer").CanvasJSChart(newVSReturningVisitorsOptions);
	});


}
$(document).ready(function(){
	var updateChart=function() {
		// window.onload = function () {
		CanvasJS.addColorSet("greenShades",
	                [//colorSet Array
	                "#05f58b",
	                "#6fd6a8",
	                "#b2ead1",
	                "#39f9a3",
	                "#2c885f"                
	                ]);

		var options_6 = {

			colorSet: "greenShades",
			animationEnabled: true,
			axisX: {
				labelFontSize: 14,
			},
			axisY: {
				labelFontSize: 14
			},
			data: [{
				type: "spline", //change it to line, area, bar, pie, etc
				dataPoints: [
          
        @foreach(revenueChart() as $revenueChart)
				{ y: {{ $revenueChart->price }} },
        @endforeach
				
				]
			}]
		};

		var options_7 = {
			colorSet: "greenShades",
			axisX: {
				labelFontSize: 14
			},
			axisY: {
				labelFontSize: 14
			},
			data: [{
				type: "splineArea", //change it to line, area, bar, pie, etc
				dataPoints: [
				{ y: {{ todayChart() }} },
				{ y: {{ lastdayChart() }} },
				{ y: {{ day3Chart(0) }} },
				{ y: {{ day4Chart() }} },
				{ y: {{ day5Chart() }} },
				{ y: {{ day6Chart() }} },
				{ y: {{ day7Chart() }} },
				{ y: {{ day8Chart() }} },
				{ y: {{ day9Chart() }} }
				]
			}]
		};
		$("#tabs_2").tabs({
			create: function (event, ui) {
				//Render Charts after tabs have been created.
				$(".courierChartContainer6").CanvasJSChart(options_6);
				$(".courierChartContainer7").CanvasJSChart(options_7);
			},
			activate: function (event, ui) {
				//Updates the chart to its container size if it has changed.
				ui.newPanel.children().first().CanvasJSChart().render();
			}
		});
	}
	updateChart();
})

    </script>
@endsection