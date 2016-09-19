@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Facility')
@section('content2')


<div class="col-lg-12">


<div class="box">
@if ($facilities->isEmpty())
<div class="box-header">
  <p> There are no facilities. </p>
</div>
@else
<div class="box-body">
  <table style="width:100%">
    <thead>
      <tr>
      <th>Name</th>
      <th>Capacity</th>
      <tr>
    </thead>
    <tbody>
      @foreach($facilities as $facility)
      <tr>
        <td> {{$facility->name}} </td>
        <td> {{$facility->capacity}} </td>
        <td><a href="{!! action('FacilityController@edit',array($typeid, $facility->id)) !!}"><button class="btn btn-info">edit</button></a></td>
        <td><button value="{!! route('faci.delete', [$typeid, $facility->id]) !!}" class="btn btn-danger confirmDeleteBtn">Delete</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endif

<a href="{!! route('faci.add',$typeid ) !!}" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
  <div class="label-text">Add Facility</div>
  <i class="fa fa-arrow- label-arrow"></i>


</div>

@endsection
