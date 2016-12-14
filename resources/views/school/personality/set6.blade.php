@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Personality Test</h4>
				<p class="category">Instructions: click or tap the box to tick the box, tick as many box as you like <br>Tick the item that you would enjoy do </p>
			</div>
			<div class="card-content">

				<form method="get" action="{{ action('School\PublicPersonalityController@result') }}">
					<div class="checkbox">
						<label>
	<input type="checkbox" name="c6" value="1">Sell things </br></label>
					</div>
					<div class="checkbox">
						<label>
	<input type="checkbox" name="b7" value="1">Create a sculpture </br></label>
					</div>
					<div class="checkbox">
						<label>
	<input type="checkbox" name="f1" value="1">Keep detailed reports </br></label>
					</div>
					<div class="checkbox">
						<label>
	<input type="checkbox" name="f8" value="1">Proofread a document </br></label>
					</div>

					<button class="btn btn-success"> Submit </button>
				</form>
			</div>

		</div>
	</div>

</div>

@endsection
