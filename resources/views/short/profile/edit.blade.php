@extends('client.layout.headerLayout')

@section('headbar', 'Edit Faculty')
@section('title', 'Profile')
@section('headbar', 'Edit Profile')
@section('content2')

<div class="box box-primary">
  <div class="box-header">
    <div class="col-md-2">
    <h3>Edit profile info</h3>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-2">
      <label>
          Title
      </label>
      </div>
      <div class="col-md-10">
        <input type="text" value="" name="name_first" placeholder="First Name">
      </div>

    </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        First Name
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_first" placeholder="First Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Last Name
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Headline
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        NRIC
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Phone #
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Address
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">

    <div class="col-md-10 col-md-offset-2">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Email
    </label>
    </div>
    <div class="col-md-10">
      <input type="text" value="" name="name_last" placeholder="Last Name">
    </div>

  </div>

  <div class="row">
    <div class="col-md-2">
    <label>
        Biography
    </label>
    </div>
    <div class="col-md-10 col-sm-12 col-xs-12">
      <textarea type="text" value="" name="name_last" placeholder="Last Name"></textarea>
    </div>

  </div>
  <div class="row">
    <div class="col-md-2">
    <label>
        Profile Picture
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
