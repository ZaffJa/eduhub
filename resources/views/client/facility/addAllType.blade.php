@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Add Facility')
@section('content2')

<div class="col-lg-12">



<div class="box box-primary">
<div class="box-header with-border">
<h3>Facilities Form</h3>
</div>
<div class="box-body">
<form action="{{route('faci.storeAll')}}" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <label>Facility Name</label>
  <input type="text" id="faci_name" name="faci_name" placeholder="Facility Name">
  <label>Details</label>
  <textarea type="text" id="faci_cap" name="faci_cap" placeholder="Details"></textarea>
  <label>Facility Type
    <select id="id_type" name="typeid" aria-controls="example1" class="form-control input-md">

    <option value=1>Cafeteria</option>
    <option value=2>Transportation</option>
    <option value=3>Mosque</option>
    <option value=4>Bank/ATM</option>
    <option value=5>Residential Colleges</option>
    <option value=6>Library</option>
    <option value=7>Laboratories</option>
    <option value=8>Medical &amp; Health Services</option>
    <option value=9>Sports &amp; Recreation </option>
    <option value=10>Mini Post Office</option>
  </select>
  </label>

</br>
<div class="col-md-10">
</div>
<div class="col-md-2">
 <a href="{{route('faci.viewType')}}" class="btn btn-warning">Cancel</a>
  <button class="btn btn-success">Submit</button>
</div>

</form>
</div>
</div>
</div>
@endsection
