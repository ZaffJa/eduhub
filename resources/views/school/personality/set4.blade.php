@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="purple">
				<h4 class="title">Personality Test</h4>
				<p class="category">Instructions: click or tap the box to tick the box, tick as many box as you like <br>Tick the item that you would enjoy do </p>
			</div>
			<div class="card-content">
				<form method="get" action="{{ action('School\PublicPersonalityController@set5') }}">
					<div class="checkbox">
						<label>
						<input type="checkbox" name="a6" value="1">Plant a garden </br>
						</label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="d7" value="1">Study the solar system </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="e3" value="1">Help people who are upset </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="f2" value="1">Operate business machines </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="c8" value="1">Take charge of a project </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="a9" value="1">Drive a truck </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="d6" value="1">Collect minerals and rocks </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="e8" value="1">Make people laugh </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="b4" value="1">Act in or direct a play </br>
                        </label>
					</div>
					<div class="checkbox">
						<label>
	                    <input type="checkbox" name="f4" value="1">Take telephone messages </br>
                        </label>
					</div>

					<button class="btn btn-info"> Next </button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection
