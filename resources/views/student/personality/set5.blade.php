@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="orange">
				<h4 class="title">Personality Test</h4>
				<p class="category">Instructions: click or tap the box to tick the box, tick as many box as you like <br>Tick the item that you would enjoy do </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('Student\PersonalityController@set6') }}">
					<div class="checkbox">
						<label>
					<input type="checkbox" name="b5" value="1">Write a poem,story or play </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e7" value="1">Study psychology </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="f3" value="1">Organize a work area </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="d9" value="1">Study plants and animals </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="a4" value="1">Study electronics </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e1" value="1">Work with children </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="f9" value="1">Create a filing system </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="e2" value="1">Care for a sick person </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="a3" value="1">Work outdoors </br></label></div>

					<div class="checkbox">
						<label>
					<input type="checkbox" name="c5" value="1">Save money </br></label></div>


					<button class="btn btn-info"> Next </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection 
