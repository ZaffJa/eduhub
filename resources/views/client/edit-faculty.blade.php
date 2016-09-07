@extends('client.layout.app')

@section('title', 'Faculty')

@section('content')

<h3>Faculty</h3>

@foreach ($errors->all() as $error)
  <p>
    Error Message
    <br/>
  <p>
@endforeach

@if (session('status'))
  {{session('status')}}
@endif

<input type="hidden" name="_token" value="{{!! csrf_token() !!}}">

<fieldset>
  
  <legend>Edit Faculty</legend>
  <input type="text" name="fac_name" value="{!! $faculty->name !!}">
  <button>Cancel</button>
  <button>Update</button>

</fieldset>

@endsection
