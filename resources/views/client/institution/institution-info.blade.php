@extends('client.layout.headerLayout')

@section('title', 'Institution')
@section('headbar', 'Institution Info')
@section('content2')

<div>

          <div class="col-lg-12">
            <div class="box box-solid">
              <div class="box-header with-border" style="margin-left:2%">
                <i class="fa fa-book"></i>

                <h1 class="box-title"> {{ $institution->name }} </h1>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="margin-left:2%; font-size:125%">
                <dl class="dl-horizontal">
                  <dt>Institution Type </dt>
                  <dd> {{ $institution->type->name }} </dd>
                  <hr>
                  <dt>Abbreviation</dt>
                  <dd> {{ $institution->abbreviation }} </dd>
                  <hr>
                  <dt>Established</dt>
                  <dd> {{ $institution->established }} </dd>
                  <hr>
                  <dt>Location</dt>
                  <dd> {{ $institution->location }} </dd>
                  <hr>
                  <dt>Address</dt>
                  <dd> {{ $institution->address != null ? $institution->address : 'Address not added'}} </dd>
                  <hr>
                  <dt>Website</dt>
                  <dd><a href=" {{ $institution->website != null ? $institution->website : 'Website not added '}} "> {{ $institution->website != null ? $institution->website : 'Website not added '}} </a></dd>
                  <hr>
                  <dt>Parent Institution</dt>
                  <dd> {{ $institution->parent != null ? $institution->parent->name : 'Parent institution not added' }} </dd>
                  <hr>
                  <dt>Description</dt>
                  <dd> {{ $institution->description }} </dd>
                  <hr>
                </dl>

              </div>
              <div class="box-footer">
                 <a href="{!! route('client.institution.view') !!}" class="btn btn-danger-outline">Cancel</a>
                 <a href="" class="btn btn-primary">Edit</a>
                 <a href="" class="btn btn-danger">Delete</a>
                </div>

              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

</div>











@endsection