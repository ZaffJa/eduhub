@extends('client.layout.app')

@section('title', 'Facilities')

@section('content')


@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif

@if ($facilities->isEmpty())
  <p> There are no facilities. </p>
@else
  <table>
    <thead>
      <tr>
      <th>Name</th>
      <th>Capacity</th>
      <tr>
    </thead>
    <tbody>
      @foreach($facilities as $facility)
      <tr>
        <td>{{$facility->name}}</td>
        <td>{{$facility->capacity}}</td>
        <td><a href="{!! action('FacilityController@edit',array($typeid, $facility->id)) !!}"><button>edit</button></a></td>
        <td>
          <form method="post" action="{!! action('FacilityController@delete', array($typeid, $facility->id)) !!}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endif
<a href="{!! route('faci.add',$typeid ) !!}">Add</a>
@endsection
