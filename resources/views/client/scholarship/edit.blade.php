@extends('client.layout.headerLayout')

@section('title', 'Faculty')
@section('headbar', 'Edit Faculty')
@section('content2')

<div class="box">
<div class="box-body">
<fieldset>

  <legend>Edit Faculty</legend>
  <form method="post" >
	  <input type="text" name="fac_name" value="{!! $faculty->name !!}">
	  <input type="hidden" name="_token" value="{!! csrf_token() !!}">

	  <a href="{!! route('fac_name',$faculty->id) !!}"><button class="btn btn-info">Update</button></a>
	  <a href="{!! action('FacultyController@view') !!}" class="btn btn-danger">Cancel</a>
  </form>

</fieldset>
</div>
</div>
@endsection
