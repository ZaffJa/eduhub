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
      </tr>
      @endforeach
    </tbody>
  </table>

@endif
<a href="{!! route('faci.add',$typeid ) !!}">Add</a>
@endsection