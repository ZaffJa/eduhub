@extends('school.layout.app')

@section('title', 'Dashboard')
@section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="card">
			<div class="card-header" data-background-color="red">
				<h4 class="title">Personality Test</h4>
				<p class="category">Instructions: click or tap the box to tick the box, tick as many box as you like <br>Tick the item that you would enjoy do </p>
			</div>
			<div class="card-content">
				<form method="get" action="{{ action('School\PublicPersonalityController@set2') }}">
					<div class="checkbox">
						<label>
										<input type="checkbox" name="a1" value="1">Repair a car </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="b2" value="1">Design clothing </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="c3" value="1">Supervise the work of others </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="d4" value="1">Work in a science lab </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="e5" value="1">Help a person with disabilities </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="f6" value="1">Balance a budget </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="a7" value="1">Work with animals </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="b8" value="1">Arrange flowers </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="c9" value="1">Work in a political campaign </br>
									</label>
					</div>
					<div class="checkbox">
						<label>
										<input type="checkbox" name="d1" value="1">Study causes of diseases </br>
									</label>
					</div>

					<button class="btn btn-info"> Next </button>
				</form>


			</div>

		</div>
	</div>
</div>
@endsection
