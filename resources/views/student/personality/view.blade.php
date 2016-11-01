@extends('student.layout.app')

@section('title', 'Dashboard')
@section('content')
<h1>Take a personality test to determine what type of university courses suits you the most</h1>
<h3>The personality test will consist of 54 questions</h3>
<h3>Check tick of the items that you think you would enjoy do</h3>
<h4>Note: click or tap the box the tick.</h4>
<h3>There are no limit of item, tick as many as you like</h3>
<h3>Click the button below to take the personality test</h3>
<a href="{!! action('Student\PersonalityController@set1') !!}">
<button>Start</button>
</a>
@endsection
