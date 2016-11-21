@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Edit Facility')
@section('content2')

<div class="box">

<div class="box-body">
<fieldset>

  <legend>Edit Facility</legend>

  <form method="post" enctype="multipart/form-data" class="confirmLeaveBeforeSave">
    <div class="row">
      <div class="col-md-1">
        Facility Name
      </div>
      <div class="col-md-10">
        <input type="text" name="faci_name" value="{!! $facility->name !!}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
        Facility Details
      </div>
      <div class="col-md-10">
        <textarea type="text" name="faci_capacity" placeholder="Details">{!! $facility->capacity !!}</textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-md-1">
        Upload Image
      </div>
      <div class="col-md-10">
        <input type="file" name="faci_img">
        <p class="help-block">File only accept jpeg, png, bmp, gif, or svg</p>
      </div>
    </div>
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
