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
              <h3 class="widget-user-username">University of Technology, Malaysia</h3><!--University name-->
              <h5 class="widget-user-desc">Skudai Johor</h5>
              <a href="/client-dashboard/edit-profile" style="color:black"><i class="fa fa-pencil-square-o"></i> <span>Edit Info</span></a>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="http://www.iiwas.org/conferences/iiwas2011/img/logos/UTM.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">FOLLOWERS</span>

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">PRODUCTS</span>
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
      <div class="col-lg-12">
        <a href="">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/book-02.png')">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename">Course</span>
                </div>
            </div>
          </div>
        </a>
      </div>


    </div>
    <div class="row">
      <div class="col-lg-3">
        <a href="">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/book-02.png')">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename">Course</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/library.jpg')">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename">Course</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/library.jpg')">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename">Course</span>
                </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3">
        <a href="">
          <div class="box-body">
            <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/library.jpg')">
              <div class="mdl-card__title mdl-card--expand"  >

              </div>
                <div class="mdl-card__actions" >
                  <span class="demo-card-image__filename">Course</span>
                </div>
            </div>
          </div>
        </a>
      </div>


    </div>

    @endsection
