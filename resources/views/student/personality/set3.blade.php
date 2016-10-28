@extends('student.layout.app')

@section('title', 'Dashboard')
@section('content')
<h4>Instructions: click or tap the box to tick the box, tick as many box as you like</h4>
<h4>Tick the item that you would enjoy do</h4>

<form method="get" action="{{ action('Student\PersonalityController@set4') }}">
	<input type="checkbox" name="b1" value="1">Sing before the public </br>
	<input type="checkbox" name="c2" value="1">Make a speech </br>
	<input type="checkbox" name="d3" value="1">Study human anatomy </br>
	<input type="checkbox" name="e4" value="1">Interview clients </br>
	<input type="checkbox" name="f5" value="1">Attend to details </br>
	<input type="checkbox" name="a5" value="1">Arrest lawbreakers </br>
	<input type="checkbox" name="b6" value="1">Design a poster </br>
	<input type="checkbox" name="c7" value="1">Lead a meeting </br>
	<input type="checkbox" name="d8" value="1">Do math problems </br>
	<input type="checkbox" name="e9" value="1">Teach teens or adults </br>
	<button> Next </button>
</form>
@endsection
