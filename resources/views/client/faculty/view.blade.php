@extends('client.layout.app')

@section('title', 'Faculty')

@section('content')

<h3>Faculty</h3>

@if ($faculties->isEmpty())
  <p> There is no faculties. </p>
@else

@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif

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
        <td> {!! $faculty->name !!} </td>
        <td> <a href="{!! action('FacultyController@edit', $faculty->id) !!}"><button>Edit</button></a></td>
        <td>
        <form method="post" action="{!! action('FacultyController@delete', $faculty->id) !!}">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <button type="submit">Delete</button>
        </form>
       </td>
      </tr>
    @endforeach
  </tbody>
</table>
<a href="{!! action('FacultyController@add') !!}"><button>Add</button></a>

@endif

@endsection
