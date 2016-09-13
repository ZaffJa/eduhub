@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Edit Facility')
@section('content2')

<div class="box">

@if (session('status'))
<div class="box-header">
  <label>
    {{session('status')}}
  </label>
</div>
@endif
<div class="box-body">
<fieldset>

  <legend>Edit Facility</legend>

  <form method="post" >
    <input type="text" name="faci_name" value="{!! $facility->name !!}">
    <input type="number" name="faci_capacity" value="{!! $facility->capacity !!}">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <a href="{!! route('faci.update', array($typeid, $facility->id)) !!}"><button class="btn btn-info">Update</button></a>
    <a href="{!! route('faci.view', $typeid) !!}" class="btn btn-danger">Cancel</a>
  </form>

</fieldset>
</div>
</div>
@endsection
