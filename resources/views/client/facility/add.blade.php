@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Add Facility')
@section('content2')
<div class="col-lg-12">


@if (session('status'))
<div class="box with-border">
 <label>
     {{session('status')}}
 </label>
</div>
@endif


<div class="box box-primary"> @if (session('status'))
    <div class="box-header with-border"> <label> {{session('status')}} </label>
    </div> @endif
    <form role="form" method="POST" action="{{route('faci.store', $typeid)}}" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <div class="form-group">
          <label>Facility Name</label>
           <input type="text" id="fac_name" name="fac_name" placeholder="Facility Name">
        </div>
        <div class="form-group">
          <label>Capacity</label>
           <input type="text" id="fac_name" name="fac_name" placeholder="Capacity">
        </div>
      </div>
      <div class="box-footer">
         <a href="{{route('faci.view', $typeid)}}" class="btn btn-danger">Cancel</a>
          <button class="btn btn-primary">Submit</button>
        </div>
</form>
</div>
</div>
@endsection
