@extends('client.layout.app')

@section('title', 'Faculty')

@section('content')

<h3>Faculty</h3>

@if ($faculties->isEmpty())
  <p> There is no faculties. </p>
@else

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach($faculties as $faculty)
      <tr>
        <td> {!! $faculty->id !!} </td>
        <td> {!! $faculty->name !!} </td>
        <td> <a href="{!! action('FacultyController@edit', $faculty->id) !!}">Edit</a> </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endif

@endsection
