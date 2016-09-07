@extends('client.layout.app')

@section('title', 'Faculty')

@section('content')

<h3>Faculty Form</h3>
<form action="{{route('example')}}" method="post">
  <label>Faculty Name</label>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
  <input type="text" id="fac_name" name="test" placeholder="Faculty Name">
  <label>Image</label>
  <!-- TODO
        upload image feature
   -->
   <button>Cancel</button>
   <button>Submit</button>
</form>
@endsection
