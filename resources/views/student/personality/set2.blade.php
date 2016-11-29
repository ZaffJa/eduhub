@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Personality Test</h4>
				<p class="category">Instructions: click or tap the box to tick the box, tick as many box as you like <br>Tick the item that you would enjoy do </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('Student\PersonalityController@set3') }}">
					<div class="checkbox">
						<label>
				<input type="checkbox" name="a2" value="1">Build things with wood </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="b3" value="1">Decorate a home or office </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="c4" value="1">Start a club </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="d5" value="1">Research solutions to environmental problems </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="e6" value="1">Work as a volunteer </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="f7" value="1">Use a computer </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="a8" value="1">Operate power tools </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="b9" value="1">Make videos </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="c1" value="1">Start my own business </br>
			</label>
					</div>
					<div class="checkbox">
						<label>
				<input type="checkbox" name="d2" value="1">Work on a science project </br>
			</label>
					</div>
					<button class="btn btn-info"> Next </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection
