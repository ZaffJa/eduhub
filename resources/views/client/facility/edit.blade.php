@extends('client.layout.app')

@section('title', 'Facilities')

@section('content')


@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif

<fieldset>
  
  <legend>Edit Facility</legend>

  <form method="post" >
    <input type="text" name="faci_name" value="{!! $facility->name !!}">
    <input type="number" name="faci_capacity" value="{!! $facility->capacity !!}">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <a href="{!! route('faci.update', array($id, $facility->id)) !!}"><button>Update</button></a>
    <a href="{!! route('faci.view', $id) !!}">Cancel</a>
  </form>

</fieldset>

@endsection