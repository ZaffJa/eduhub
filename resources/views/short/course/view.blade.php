@extends('short.layout.headerApp')


@section('title', 'Short Course')
@section('headbar', 'Short Courses')
@section('content2')
<div class="box box-primary">
  <div class="box-header">
    <div class="col-md-2">
    <h4>Short Courses</h4>
    </div>
  </div>
  <div class="box-body">

  </div>
  <div class="box-footer">


  </div>

</div>

  <a href=" {!! route('short.course.add') !!} " class="float">
      <i class="fa fa-plus my-float"></i>
  </a>
  <div class="label-container">
      <div class="label-text">Add Course</div>
      <i class="fa fa-arrow- label-arrow"></i>
  </div>

@endsection
