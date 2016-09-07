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
<label>
  {{session('status')}}
</label>
@endif

<fieldset>
  
  <legend>Edit Faculty</legend>
  <form method="post" >
	  <input type="text" name="fac_name" value="{!! $faculty->name !!}">
	  <input type="hidden" name="_token" value="{!! csrf_token() !!}">

	  <a href="{!! route('fac_name',$faculty->id) !!}"><button>Update</button></a>
	  <a href="{!! action('FacultyController@view') !!}">Cancel</a>
  </form>

</fieldset>

@endsection
