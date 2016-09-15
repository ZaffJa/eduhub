@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Edit Institution')
@section('content2')
<div class="box box-primary">
<style media="screen">
    .col-md-2 {
        text-align: center;
    }

    .row {
        padding-top: 10px;

    }
</style>
  <form class=""  method="post" autocomplete="off">
    <div class="box-body">
      <div class="row">
          <div class="col-md-2">
              Institution Name
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-4">
                
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Institution Type
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Abbreviation
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Established
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Location
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Address
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Website
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Parent Institution
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Description
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <div class="box-footer">
      {{ csrf_field() }}
        <a href=""><button class='btn btn-success '>Submit</button></a>
        <a href="" class="btn btn-warning ">Cancel</a>          
    </div>
  </form>
</div>
@endsection
