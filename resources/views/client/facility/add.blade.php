@extends('client.layout.app')

@section('title', 'Facilities')

@section('content')

@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif

<h3>Facilities Form</h3>
<form action="{{route('faci.store', $id)}}" method="post">
  <label>Facility Name</label>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="text" id="faci_name" name="faci_name" placeholder="Facility Name">
  <input type="text" id="faci_cap" name="faci_cap" placeholder="Capacity">
  <label>Image</label></br>
  <!-- TODO
        upload image feature
   -->
   <a href="{{route('faci.view', $id)}}">Cancel</a>
   <button>Submit</button>
</form>

@endsection