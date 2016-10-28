@extends('student.layout.app')

@section('title', 'Dashboard')
@section('content')
<h4>Instructions: click or tap the box to tick the box, tick as many box as you like</h4>
<h4>Tick the item that you would enjoy do</h4>

<form method="get" action="{{ action('Student\PersonalityController@result') }}">
	<input type="checkbox" name="c6" value="1">Sell things </br>
	<input type="checkbox" name="b7" value="1">Create a sculpture </br>
	<input type="checkbox" name="f1" value="1">Keep detailed reports </br>
	<input type="checkbox" name="f8" value="1">Proofread a document </br>
	<button> Next </button>
</form>
@endsection
