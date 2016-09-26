@extends('client.layout.headerLayout')

@section('title', 'Faculty')
@section('headbar', 'Add Faculty')
@section('content2')
<div class="col-lg-12">
  <div class="box box-primary">
    <form role="form" method="POST" action="{{route('client.faculty.store')}}" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <div class="form-group">
          <label>Faculty Name</label>
          <input type="text" id="fac_name" name="fac_name" placeholder="Faculty Name">
        </div>
        <div class="form-group"> <label for="exampleInputFile">Image</label> <input type="file" id="exampleInputFile" name="fac_file">
          <p class="help-block">File only accept jpg and png file format</p>
        </div>
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
          <a href="{!! route('client.faculty.view') !!}" class="btn btn-warning">Cancel</a> <button class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
