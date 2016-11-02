@extends('student.layout.app') @section('title', 'Dashboard') @section('content')


<div class="row">
	<div class="col-md-4">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#pablo">
					<img class="img" src="../assets/img/faces/marc.jpg" />
				</a>
			</div>

			<div class="content">
				<h6 class="category text-gray">CEO / Co-Founder</h6>
				<h4 class="card-title">Alec Thompson</h4>
				<p class="card-content">
					Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
				</p>
				<a href="#pablo" class="btn btn-primary btn-round">Follow</a>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-chart" data-background-color="orange">
				<div class="ct-chart" id="dailySalesChart"></div>
			</div>
			<div class="card-content">
				<h4 class="title">Daily Sales</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header card-chart" data-background-color="orange">
				<div class="chart-demo">
    <h2 class="title">Radar Chart</h2>
    <canvas id="radarChart" width="640" height="400"></canvas>
  </div>
			</div>
			<div class="card-content">
				<h4 class="title">Daily Sales</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header card-chart" data-background-color="orange">
				<div class="ct-chart" id="dailySalesChart"></div>
			</div>
			<div class="card-content">
				<h4 class="title">Daily Sales</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header card-chart" data-background-color="orange">
				<div class="ct-chart" id="dailySalesChart"></div>
			</div>
			<div class="card-content">
				<h4 class="title">Daily Sales</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> increase in today sales.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">

</div>

<script>
/*!
 * Chart.js
 * http://chartjs.org
 *
 * Copyright 2013 Nick Downie
 * Released under the MIT license
 * https://github.com/nnnick/Chart.js/blob/master/LICENSE.md
 */


// ======================================================
// Radar Chart
// ======================================================

// Radar Chart Options
var radarOptions = {

	//Boolean - If we show the scale above the chart data
	scaleOverlay : false,

	//Boolean - If we want to override with a hard coded scale
	scaleOverride : false,

	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : null,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : null,
	//Number - The centre starting value
	scaleStartValue : null,

	//Boolean - Whether to show lines for each scale point
	scaleShowLine : true,

	//String - Colour of the scale line
	scaleLineColor : "#999",

	//Number - Pixel width of the scale line
	scaleLineWidth : 1,

	//Boolean - Whether to show labels on the scale
	scaleShowLabels : false,

	//Interpolated JS string - can access value
	scaleLabel : "<%=value%>",

	//String - Scale label font declaration for the scale label
	scaleFontFamily : "'Arial'",

	//Number - Scale label font size in pixels
	scaleFontSize : 12,

	//String - Scale label font weight style
	scaleFontStyle : "normal",

	//String - Scale label font colour
	scaleFontColor : "#666",

	//Boolean - Show a backdrop to the scale label
	scaleShowLabelBackdrop : true,

	//String - The colour of the label backdrop
	scaleBackdropColor : "rgba(255,255,255,0.75)",

	//Number - The backdrop padding above & below the label in pixels
	scaleBackdropPaddingY : 2,

	//Number - The backdrop padding to the side of the label in pixels
	scaleBackdropPaddingX : 2,

	//Boolean - Whether we show the angle lines out of the radar
	angleShowLineOut : true,

	//String - Colour of the angle line
	angleLineColor : "rgba(255,255,255,0.3)",

	//Number - Pixel width of the angle line
	angleLineWidth : 1,

	//String - Point label font declaration
	pointLabelFontFamily : "'Arial'",

	//String - Point label font weight
	pointLabelFontStyle : "normal",

	//Number - Point label font size in pixels
	pointLabelFontSize : 12,

	//String - Point label font colour
	pointLabelFontColor : "#EFEFEF",

	//Boolean - Whether to show a dot for each point
	pointDot : true,

	//Number - Radius of each point dot in pixels
	pointDotRadius : 3,

	//Number - Pixel width of point dot stroke
	pointDotStrokeWidth : 1,

	//Boolean - Whether to show a stroke for datasets
	datasetStroke : true,

	//Number - Pixel width of dataset stroke
	datasetStrokeWidth : 1,

	//Boolean - Whether to fill the dataset with a colour
	datasetFill : true,

	//Boolean - Whether to animate the chart
	animation : true,

	//Number - Number of animation steps
	animationSteps : 60,

	//String - Animation easing effect
	animationEasing : "easeOutQuart",

	//Function - Fires when the animation is complete
	onAnimationComplete : null

}

// Radar Data
var radarData = {
	labels : ["January","February","March","April","May","June","July"],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			data : [65,59,90,81,56,55,40]
		}

	]
}


//Get the context of the Radar Chart canvas element we want to select
var ctx = document.getElementById("radarChart").getContext("2d");

// Create the Radar Chart
var myRadarChart = new Chart(ctx).Radar(radarData, radarOptions);


// ======================================================
// Doughnut Chart
// ======================================================

</script>
@endsection
