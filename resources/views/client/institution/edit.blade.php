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
  <form method="post" autocomplete="off">
    <div class="box-body">
      <div class="row">
          <div class="col-md-2">
              Institution Name
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-4">
                <input name="name" type="text" value="{!! $institution->name !!}" placeholder="Institution Name">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Institution Type
            </div>
            <div class="col-md-2">
                {{ Form::select('type_id', $institution_types ,$institution->type_id )}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Abbreviation
            </div>
            <div class="col-md-2">
                <input name="abbreviation" type="text" value="{!! $institution->abbreviation !!}" placeholder="Abbreviation">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Established
            </div>
            <div class="col-md-1">
                <input name="established" type="text" value="{!! $institution->established !!}" placeholder="Established">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Location
            </div>
            <div class="col-md-4">
                <input name="location" type="text" value="{!! $institution->location !!}" placeholder="Location">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Address
            </div>
            <div class="col-md-2">
                <input name="address" type="text" value="{!! $institution->address != null ? $institution->address : 'Addresss not added' !!}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Website
            </div>
            <div class="col-md-4">
                <input name="website" type="text" value="{!! $institution->website != null ? $institution->website : 'Website not added' !!}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Main Branch
            </div>
            <div class="col-md-4">
                {{ Form::select('parent_id', $parent_institution, $institution->parent_id != null ? $institution->website : null) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                Description
            </div>
            <div class="col-md-4">
                <input name="description" type="text" value="{!! $institution->description !!} " placeholder="Institution Description">
            </div>
        </div>
    </div>
    <div class="box-footer">
      {{ csrf_field() }}
        <a href="{!! route('client.institution.update', $institution->id) !!}"><button class='btn btn-success '>Update</button></a>
        <a href="{!! route('client.institution.view.institution', $institution->id) !!}" class="btn btn-warning ">Cancel</a>          
    </div>
  </form>
</div>
@endsection
