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


	var options_1 = {
		animationEnabled: true,
		colorSet: "greenShades",
		axisY: {
			title: "Growth Rate (in %)",
			suffix: "%"
		},
		axisX: {
			title: "Months"
		},
		data: [{
			type: "column",
			yValueFormatString: "#,##0.0#"%"",
			dataPoints: [
			{ label: "January", y: 10.09 },	
			{ label: "Feburary", y: 9.40 },	
			{ label: "March", y: 8.50 },
			{ label: "April", y: 7.96 },	
			{ label: "May", y: 7.80 },
			{ label: "June", y: 7.56 },
			{ label: "July", y: 7.20 },
			{ label: "August", y: 7.1 }
			
			]
		}]
	};
	$("#courierChartContainer").CanvasJSChart(options_1);

	var options_3 = {
		colorSet: "greenShades",
		animationEnabled: true,
		axisX: {
			labelFontSize: 14
		},
		axisY: {
			labelFontSize: 14
		},
		data: [{
			type: "spline", //change it to line, area, bar, pie, etc
			dataPoints: [
			{ y: 10 },
			{ y: 6 },
			{ y: 14 },
			{ y: 12 },
			{ y: 19 },
			{ y: 14 },
			{ y: 26 },
			{ y: 10 },
			{ y: 22 }
			]
		}]
	};

	var options_4 = {
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
			{ y: 10 },
			{ y: 6 },
			{ y: 14 },
			{ y: 12 },
			{ y: 19 },
			{ y: 14 },
			{ y: 26 },
			{ y: 10 },
			{ y: 22 }
			]
		}]
	};

	$("#tabs").tabs({
		create: function (event, ui) {
			//Render Charts after tabs have been created.
			$("#courierChartContainer3").CanvasJSChart(options_3);
			$("#courierChartContainer4").CanvasJSChart(options_4);
		},
		activate: function (event, ui) {
			//Updates the chart to its container size if it has changed.
			ui.newPanel.children().first().CanvasJSChart().render();
		}
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
				{ y: 10 },
				{ y: 6 },
				{ y: 14 },
				{ y: 12 },
				{ y: 19 },
				{ y: 14 },
				{ y: 26 },
				{ y: 10 },
				{ y: 22 }
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
				{ y: 10 },
				{ y: 6 },
				{ y: 14 },
				{ y: 12 },
				{ y: 19 },
				{ y: 14 },
				{ y: 26 },
				{ y: 10 },
				{ y: 22 }
				]
			}]
		};
		$("#tabs_2").tabs({
			create: function (event, ui) {
				//Render Charts after tabs have been created.
				$("#courierChartContainer6").CanvasJSChart(options_6);
				$("#courierChartContainer7").CanvasJSChart(options_7);
			},
			activate: function (event, ui) {
				//Updates the chart to its container size if it has changed.
				ui.newPanel.children().first().CanvasJSChart().render();
			}
		});
	}
	updateChart();
})
