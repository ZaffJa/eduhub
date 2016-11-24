@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
<script type="text/javascript">
	var data = [];

	@foreach($res as $r)
	data.push('{{$r[1]}}' * 1);
	@endforeach

</script>
<div class="row">

	<div class="col-md-8">

		<div class="card">
			<div class="card-header" data-background-color="purple">
				<h4 class="title">Personality result</h4>
				<p class="category">result of personality test</p>
			</div>
			<div class="card-content table-responsive">
				<table class="table">
					<thead class="text-primary">
						<tr>
							<th>Your score</th>
							<th>Type of person</th>
						</tr>
					</thead>
					<tbody>
						@foreach($res as $r)
						<tr>
							<td>{{$r[1]}}</td>
							<td>{{$r[0]}} </td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
			<div class="card-footer">
				<div class="stats">
					<h4 class="title">Here are your personality result</h4>
					<h3>You are a {{$res[0][0]}} person</h3>
					<h4>
						@foreach($personalityType as $pt)
							@if($res[0][0] == $pt->type)
								{{$pt->description}}
							@endif
						@endforeach
					</h4>
					<h3>Recommended course for you</h3>
						@foreach($course as $c)
							<h5>
								{{$c->name_en}} at {{$c->institution->institution->name}}
							</h5>
						@endforeach
					<h3>Careers recommended based on your personality</h3>

						<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">


					@foreach($careerImage as $ci)

						<div class="item active">
			        <img src="../img/{{$ci->path}}" alt="Chania" width="460" height="345">
			        <div class="carousel-caption">
			          <h3>Chania</h3>
			          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
			        </div>
			      </div>
					@endforeach



		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4 col-sm-12">
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
</div>
<div class="row">
	<div class="col-md-8">
		<div class="card-header">
			<h4 class="title">
				Personality Description (click to expand)
			</h4>
		</div>
	</div>

	<div class="card">
		<div class="card-header" data-background-color="purple" data-toggle="collapse" data-target="#realistic">
			<h4 class="title">Realistic</h4>
		</div>
		<div class="card-content table-responsive">
			<div id="realistic" class="collapse">
				<h4>
				The "Do-ers." People who enjoy practical, hands-on problems and solutions. May have athletic or mechanical ability. Prefer to work with objects, machines, tools, plants, and/or animals. May prefer to work outdoors. They like to accomplish tasks. They are dependable, punctual, detailed, hard-working, and reliable individuals. Possible careers include mechanic, chef, engineer, police officer, athlete, pilot, soldier, and firefighter.
				</h4>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header" data-background-color="purple" data-toggle="collapse" data-target="#investigate">
			<h4 class="title">
				Investigative
			</h4>
		</div>
		<div class="card-content table-responsive">
			<div id="investigate" class="collapse">
				<h4>
					The "Thinkers." People who enjoy work activities that have todo with ideas and thinking more than physical activity. They like to observe, learn, investigate, analyze, evaluate, problem-solve. They are scientific and lab-oriented, and are fascinated by how things work. They tend to have logical and mathematical abilities. They are complex, curious, research-oriented, cool, calm and collected individuals. Possible careers include architect, computer scientist, psychologist, doctor, and pharmacist.
				</h4>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header" data-background-color="purple"  data-toggle="collapse" data-target="#artistic">
			<h4 class="title" >Artistic</h4>
		</div>
		<div class="card-content table-responsive">
			<div id="artistic" class="collapse">
			<h4>The "Creators." People who have artistic, innovative, intuitional ability and like to work in unstructured situations using imagination and creativity. They like self-expression in their work. Possible careers include musician, artist, interior designer, graphic designer, actor, writer, and lawyer.</h4>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header" data-background-color="purple"  data-toggle="collapse" data-target="#social">
			<h4 class="title">Social</h4>
		</div>
		<div class="card-content table-responsive">
			<div id="social" class="collapse">
				<h4>The "Helpers." people who like to work with others by informing, helping, training, teaching, developing, or curing them. Often are skilled with words. They enjoy healing others and have a lot of empathy for the feelings of others. Possible carrers include social worker, counselor, occupational therapist, teacher, nurse, librarian, and dental hygienist.</h4>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header" data-background-color="purple"  data-toggle="collapse" data-target="#enterprising">
			<h4 >Enterprising</h3>
		</div>
		<div class="card-content table-responsive">
			<div id="enterprising" class="collapse">
				<h4>The "Persuaders." People who enjoy work activities that have to do with starting up and carrying out projects, especially business ventures. They like influencing, persuading, and leading people and making decisions. They may be easily bored and grow restless with routine. They prefer to work in their own unique style and like to take risks. Possible careers include business owner, lawyer, school administrator, sales person, real estate agent, judge, and public relations specialist.</h4>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header" data-background-color="purple"  data-toggle="collapse" data-target="#conventional">
			<h4>Conventional</h4>
		</div>
		<div class="card-content table-responsive">
			<div id="conventional" class="collapse">
				<h4>The "Organizers." People who like to work with data, have clerical and/or numerical ability, and who enjoy work activites that follow set procedures and routines. Conventional types are people who are good at coordinating people, places, or events. Possible careers include accountant, secretary, bank teller, dental assistant, and math teacher.</h4>
			</div>
		</div>
	</div>


</div>
@endsection
<!--  Charts Plugin -->
