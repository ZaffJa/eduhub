@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="green">
				<h4 class="title">Personality Test</h4>
				<p class="category">Instructions: click or tap the box to tick the box, tick as many box as you like <br>Tick the item that you would enjoy do </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('School\PublicPersonalityController@set4') }}">
					<div class="checkbox"><label>
					<input type="checkbox" name="b1" value="1">Sing before the public </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="c2" value="1">Make a speech </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="d3" value="1">Study human anatomy </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e4" value="1">Interview clients </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="f5" value="1">Attend to details </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="a5" value="1">Arrest lawbreakers </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="b6" value="1">Design a poster </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="c7" value="1">Lead a meeting </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="d8" value="1">Do math problems </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e9" value="1">Teach teens or adults </br></label></div>


					<button class="btn btn-info"> Next </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection
