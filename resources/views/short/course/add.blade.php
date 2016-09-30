@extends('client.layout.headerLayout')


@section('title', 'Short Course')
@section('headbar', 'Add Course')
@section('content2')

<div class="box box-primary">
  <div class="box-header">
    <div class="col-md-2">
    <h3>Add Short Course</h3>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-2">
      <label>
          Course Name
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="" name="name_first" placeholder="First Name">
      </div>

    </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Venue name
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Date
    </label>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12">
      <input type="date" value="" >
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Detail
    </label>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12">
      <textarea type="text" value="" name="name_last" placeholder="Last Name"></textarea>
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
         Promotion poster
    </label>
    </div>
    <div class="col-md-10">
      <input type="file" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  </div>
  <div class="box-footer">

    <div class="col-md-offset-9">
            <a href="" class="btn btn-warning ">Cancel</a>
            <a href=""><button class='btn btn-success '>Update</button></a>
    </div>

  </div>

</div>
@endsection
