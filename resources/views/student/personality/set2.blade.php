@extends('student.layout.app')

@section('title', 'Dashboard')
@section('content')
<h4>Instructions: click or tap the box to tick the box, tick as many box as you like</h4>
<h4>Tick the item that you would enjoy do</h4>

<form method="get" action="{{ action('Student\PersonalityController@set3') }}">
	<input type="checkbox" name="a2" value="1">Build things with wood </br>
	<input type="checkbox" name="b3" value="1">Decorate a home or office </br>
	<input type="checkbox" name="c4" value="1">Start a club </br>
	<input type="checkbox" name="d5" value="1">Research solutions to environmental problems </br>
	<input type="checkbox" name="e6" value="1">Work as a volunteer </br>
	<input type="checkbox" name="f7" value="1">Use a computer </br>
	<input type="checkbox" name="a8" value="1">Operate power tools </br>
	<input type="checkbox" name="b9" value="1">Make videos </br>
	<input type="checkbox" name="c1" value="1">Start my own business </br>
	<input type="checkbox" name="d2" value="1">Work on a science project </br>
	<button> Next </button>
</form>
@endsection
