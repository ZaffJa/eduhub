@extends('client.layout.app')

@section('title', 'Dashboard')

    @section('content')
    <div class="row">
      <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red-active">
              <i
              <!-- <h3 class="widget-user-username">{{ $institution->name }}</h3><!--University name-->
              <h5 class="widget-user-desc">Skudai Johor</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="http://www.iiwas.org/conferences/iiwas2011/img/logos/UTM.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{ $faculty_count }}</h5>
                    <span class="description-text">Faculty</span>
                  </div>
                  <!-- /.description-block -->
               </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{ $facility_count }}</h5>
                    <span class="description-text">Facility</span>

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"> {{ $course_count }} </h5>
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
        <a href="/client-dashboard/institution">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/institution-05.png'); background-size: 30%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >
              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black; ">Institution</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-6">
        <a href="/client-dashboard/faculty">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/faculty-04.png'); background-size: 30%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >
              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black">Faculties</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      

    </div>
    <div class="row">


      <div class="col-lg-3">
        <a href="/client-dashboard/course">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/BOOK-06.png'); background-size: 30%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >
              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black">Courses</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="/client-dashboard/institution">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/sijil-02.png'); background-size: 30%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >
              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black;">Short Courses</span>
                </div>
            </div>
          </div>
        </a>
      </div>

      

      <div class="col-lg-3">
        <a href="/client-dashboard/facilities">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/dumbbell-03.png'); background-size: 45%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >
              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black">Facilities</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="/client-dashboard/scholarship/view">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/scholar-02.png'); background-size: 30%; background-color:white;">
              <div class="mdl-card__title mdl-card--expand"  >
              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename" style="font-size:150%;color:black; ">Scholarship</span>
                </div>
            </div>
          </div>
        </a>
      </div>

    </div>

    @endsection
