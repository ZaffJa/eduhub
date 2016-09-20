@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Add Facility')
@section('content2')
<div class="col-lg-12">



<div class="box box-primary">
    <form role="form" method="POST" action="{{route('faci.store', $typeid)}}" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <div class="form-group">
          <label>Facility Name</label>
           <input type="text" id="fac_name" name="faci_name" placeholder="Facility Name">
        </div>
        <div class="form-group">
          <label>Details</label>
           <textarea type="text" id="fac_name" name="faci_cap" placeholder="Details"></textarea>
        </div>
      </div>
      <div class="box-footer">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
        <a href="{{route('faci.view', $typeid)}}" class="btn btn-warning">Cancel</a>
        <button class="btn btn-success">Submit</button>

</div>
        </div>
</form>
</div>
</div>
@endsection
