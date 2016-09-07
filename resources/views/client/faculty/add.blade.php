@extends('client.layout.app')

@section('title', 'Faculty')

@section('content')

<h3>Faculty Form</h3>
<form action="{{route('fac.name.store')}}" method="post">
  <label>Faculty Name</label>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
  <input type="text" id="fac_name" name="fac_name" placeholder="Faculty Name">
  <label>Image</label>
  <!-- TODO
        upload image feature
   -->
   <a href="{{action('FacultyController@view')}}">Cancel</a>
   <button>Submit</button>
</form>
@endsection
