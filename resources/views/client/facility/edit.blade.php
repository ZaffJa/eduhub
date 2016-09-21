@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Edit Facility')
@section('content2')

<div class="box">

<div class="box-body">
<fieldset>

  <legend>Edit Facility</legend>

  <form method="post" enctype="multipart/form-data">
    <input type="text" name="faci_name" value="{!! $facility->name !!}">
    <input type="number" name="faci_capacity" value="{!! $facility->capacity !!}">
    <input type="file" name="faci_img">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="col-md-10">
</div>
<div class="col-md-2">
	<br>
    <a href="{!! route('faci.view', $typeid) !!}" class="btn btn-warning">Cancel</a>
    <a href="{!! route('faci.update', array($typeid, $facility->id)) !!}"><button class="btn btn-success">Update</button></a>
</div>
  </form>

</fieldset>
</div>
</div>
@endsection
