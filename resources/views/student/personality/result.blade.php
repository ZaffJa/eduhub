@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
<script type="text/javascript">
	var data = [];
	var type = [];
	@foreach($res as $r)
	data.push('{{$r[1]}}' * 1);
	type.push('{{$r[0]}}'.charAt(0));
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
								<script type="text/javascript">
								$(#"'{{$pt}}'").attr({aria-expanded:"true"});
								</script>
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
		    <div>


					@foreach($careerImage as $ci)

					<div class="col-md-4">
			        <img src="/img/{{$ci->path}}" class="thumbnail" alt="Chania" width="460" height="345">

			      </div>
					@endforeach




		  </div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="col-md-4 col-lg-4 col-sm-12">
		<div class="card">
			<div class="card-header" data-background-color="purple">
				<div id="container" style="min-width: 100px; max-width: 600px; height: auto; margin: auto;"></div>
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
					categories: type,
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

<div class="col-md-12">
	<div class="card">
		<div class="card-header" data-background-color="purple" >
			<h4 class="title">Personality Description (click to expand)</h4>
		</div>

		<div class="card-content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Realistic" aria-expanded="false" aria-controls="Realistic" class="collapsed">
                                                    <h4 class="panel-title">
                                                        Realistic
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="Realistic" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
                                                <div class="panel-body">
																									The "Do-ers." People who enjoy practical, hands-on problems and solutions. May have athletic or mechanical ability. Prefer to work with objects, machines, tools, plants, and/or animals. May prefer to work outdoors. They like to accomplish tasks. They are dependable, punctual, detailed, hard-working, and reliable individuals. Possible careers include mechanic, chef, engineer, police officer, athlete, pilot, soldier, and firefighter.
																									  </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Investigative" aria-expanded="false" aria-controls="Investigative">
                                                    <h4 class="panel-title">
                                                      Investigative
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="Investigative" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
																									The "Thinkers." People who enjoy work activities that have todo with ideas and thinking more than physical activity. They like to observe, learn, investigate, analyze, evaluate, problem-solve. They are scientific and lab-oriented, and are fascinated by how things work. They tend to have logical and mathematical abilities. They are complex, curious, research-oriented, cool, calm and collected individuals. Possible careers include architect, computer scientist, psychologist, doctor, and pharmacist.
																							  </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Artistic" aria-expanded="false" aria-controls="Artistic">
                                                    <h4 class="panel-title">
                                                        Artistic
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="Artistic" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    The "Creators." People who have artistic, innovative, intuitional ability and like to work in unstructured situations using imagination and creativity. They like self-expression in their work. Possible careers include musician, artist, interior designer, graphic designer, actor, writer, and lawyer.  </div>
                                            </div>
                                        </div>
																				<div class="panel panel-default">
																						<div class="panel-heading" role="tab" id="headingFour">
																								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Social" aria-expanded="false" aria-controls="Social">
																										<h4 class="panel-title">
																												Social
																												<i class="material-icons">keyboard_arrow_down</i>
																										</h4>
																								</a>
																						</div>
																						<div id="Social" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
																								<div class="panel-body">
																									The "Helpers." people who like to work with others by informing, helping, training, teaching, developing, or curing them. Often are skilled with words. They enjoy healing others and have a lot of empathy for the feelings of others. Possible carrers include social worker, counselor, occupational therapist, teacher, nurse, librarian, and dental hygienist.
																									</div>
																						</div>
																				</div>
																				<div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFive">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Enterprising" aria-expanded="false" aria-controls="Enterprising">
                                                    <h4 class="panel-title">
                                                        Enterprising
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="Enterprising" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
																									The "Persuaders." People who enjoy work activities that have to do with starting up and carrying out projects, especially business ventures. They like influencing, persuading, and leading people and making decisions. They may be easily bored and grow restless with routine. They prefer to work in their own unique style and like to take risks. Possible careers include business owner, lawyer, school administrator, sales person, real estate agent, judge, and public relations specialist.
																								  </div>
                                            </div>
                                        </div>

																				<div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingSix">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Conventional" aria-expanded="false" aria-controls="Conventional">
                                                    <h4 class="panel-title">
                                                      Conventional
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="Conventional" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
																									The "Organizers." People who like to work with data, have clerical and/or numerical ability, and who enjoy work activites that follow set procedures and routines. Conventional types are people who are good at coordinating people, places, or events. Possible careers include accountant, secretary, bank teller, dental assistant, and math teacher.
																								</div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
	</div>






</div>

</div>
@endsection
<!--  Charts Plugin -->
