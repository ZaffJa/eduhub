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
  <label>Facility Name</label>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="text" id="faci_name" name="faci_name" placeholder="Facility Name">
  <input type="text" id="faci_cap" name="faci_cap" placeholder="Capacity">
  <label>Facility Type
    <select id="id_type" name="typeid" aria-controls="example1" class="form-control input-lg">

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
  <!-- TODO
        upload image feature
   -->
   <a href="{{route('faci.viewType')}}" class="btn btn-danger">Cancel</a>
   <button class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
@endsection
