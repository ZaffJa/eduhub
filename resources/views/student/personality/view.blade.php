@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
<div class="row">
	<div class="col-md-offset-2 col-md-8">
		<div class="card">
			<div class="card-header" data-background-color="red">
				<h3 class="title">Personality Test</h3>

			</div>
			<div class="card-content">

				<h1></h1>
				<h3>The personality test will consist of a few choices</h3>
				<h3>Check tick of the items that you think you would enjoy do</h3>
				<h5>Note: click or tap the box the tick.</h5>
				<h3>There are no limit of item, tick as many as you like</h3>
				<h3>Click the button below to take the personality test</h3>

			</div>
			<div class="card-footer">
				<a href="{!! action('Student\PersonalityController@set1') !!}">
					<button class="btn btn-info">Start</button>
				</a>
			</div>

		</div>
	</div>
</div>
@endsection
