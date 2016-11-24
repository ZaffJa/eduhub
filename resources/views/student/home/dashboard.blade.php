@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
<script type="text/javascript">
	var data = [];
	var type = [];
	var res = new Array();

	res.push( new Array ('Realistic','{{$personality->realistic}}'));
	res.push( new Array ('Investigative','{{$personality->investigative}}'));
	res.push( new Array ('Artistic','{{$personality->artistic}}'));
	res.push( new Array ('Social','{{$personality->social}}'));
	res.push( new Array ('Enterprising','{{$personality->enterprising}}'));
	res.push( new Array ('Conventional','{{$personality->conventional}}'));

	for (i = 0; i < res.length; i++) { 
	data.push(res[i][1] * 1);
	type.push(res[i][0]);
	}
</script>

<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#pablo">
					<img class="img" src="{{isset(Auth::user()->student_profile_picture) ? $s3.Auth::user()->student_profile_picture->path : '/img/avatar/boy-512-03.png'}}" />
				</a>
			</div>

			<div class="content">
				<!-- <h6 class="category text-gray">CEO / Co-Founder</h6> -->
				<h4 class="card-title">{{Auth::user()->name}}</h4>
				<p class="card-content">
					<dt>Name</dt>
					<dd>{{$user->name}}</dd>
					<hr>
					<dt>Email</dt>
					<dd>{{$user->email}}</dd>
					<hr>
					<dt>Address</dt>
					<dd>{{$user->student->address or null}}</dd>
					<hr>
					<dt>Phone</dt>
					<dd>{{$user->student->phone or null}}</dd>
					<hr>
					<dt>School</dt>
					<dd>{{$user->student->school or null}}</dd>
					<hr>
					<dt>Birthday</dt>
					<dd>{{$user->student->birthday or null}}</dd>
					<hr> </p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-content" data-background-color="green">
				<div id="container" style="min-width: 200px; max-width: 600px; height: 400px; margin: 0 auto"></div>
			</div>
			<div class="card-footer">
				<h5>R = Realistic, A = Artistic, I = Investigative, E = Enterprising, S = Social, C = Conventional</h5>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(function() {

			Highcharts.chart('container', {

				chart: {
					polar: true,
					type: 'line'
				},

				title: {
					text: 'Personality',
					x: -40
				},

				pane: {
					size: '80%'
				},

				xAxis: {
					categories: ['R', 'A', 'I', 'E',
						'S', 'C'
					],
					tickmarkPlacement: 'on',
					lineWidth: 0
				},

				yAxis: {
					gridLineInterpolation: 'polygon',
					lineWidth: 0,
					min: 0
				},

				tooltip: {
					shared: true,
					pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b><br/>'
				},

				legend: {
					align: 'right',
					verticalAlign: 'top',
					y: 70,
					layout: 'vertical'
				},

				series: [{
					color: "red",
					name: 'Score',
					data: data,
					pointPlacement: 'on'
				}, ]

			});
		});
	</script>
	@if($spm_results->count() > 0)
			<div class="row">
					<div class="col-md-4 col-md-offset-2">
							<div class="card card-profile">
									<h4 class="card-title">SPM Result</h4>
									<div class="content">
											<span class="card-content">
													@foreach($spm_results as $result)
															<dt>{{ $result->subject->name }}</dt>
															<dd>{{$result->grade}}</dd>
															<hr>
													@endforeach
											</span>
									</div>
							</div>
					</div>
			</div>
	@endif

</div>

@endsection
