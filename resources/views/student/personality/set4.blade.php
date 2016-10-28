@extends('student.layout.app')

@section('title', 'Dashboard')
@section('content')
<h4>Instructions: click or tap the box to tick the box, tick as many box as you like</h4>
<h4>Tick the item that you would enjoy do</h4>

<form method="get" action="{{ action('Student\PersonalityController@set5') }}">
	<input type="checkbox" name="a6" value="1">Plant a garden </br>
	<input type="checkbox" name="d7" value="1">Study the solar system </br>
	<input type="checkbox" name="e3" value="1">Help people who are upset </br>
	<input type="checkbox" name="f2" value="1">Operate business machines </br>
	<input type="checkbox" name="c8" value="1">Take charge of a project </br>
	<input type="checkbox" name="a9" value="1">Drive a truck </br>
	<input type="checkbox" name="d6" value="1">Collect minerals and rocks </br>
	<input type="checkbox" name="e8" value="1">Make people laugh </br>
	<input type="checkbox" name="b4" value="1">Act in or direct a play </br>
	<input type="checkbox" name="f4" value="1">Take telephone messages </br>
	<button> Next </button>
</form>
@endsection
