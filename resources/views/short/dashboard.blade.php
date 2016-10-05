@extends('short.layout.app')



@section('title', 'ShortCourse')

@section('content')

<div class="row">
      <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red-active">
              <h3 class="widget-user-username">{{Auth::user()->short_provider->name}}</h3><!--Provider name-->
              <h5 class="widget-user-desc">{{Auth::user()->short_provider->headline != null ? Auth::user()->short_provider->headline : ""}}</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle hidden-xs" src="/img/avatar/boy-512-03.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">100</h5>
                    <span class="description-text">Students</span>
                  </div>
                  <!-- /.description-block -->
               </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">20</h5>
                    <span class="description-text">Facility</span>

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"> 90 </h5>
                    <span class="description-text">Course</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
</div>
    <div class="row">
      <div class="col-lg-6">
        <a href="{!! route('short.profile.view') !!} ">
          <div class="box-body">

            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/avatar/boy-512-03.png'); background-size: 40%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black">Provider Info</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6">
        <a href="/client-dashboard/facilities">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--1dp" style="background-image: url('/img/default/sijil-02.png'); background-size: 40%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black">Short Courses</span>
                </div>
            </div>
          </div>
        </a>
      </div>
    </div>
@endsection
