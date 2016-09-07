@extends('client.layout.app')

@section('title', 'Faculty')

@section('content')

<h3>Faculty</h3>

@if ($faculties->isEmpty())
  <p> There is no faculties. </p>
@else

<table>
  <thead>
  </thead>
</table>

@endsection
