@extends('layouts.app') @section('content')

    <div class="col-lg-12">
            <div class="row">
              <div class="col-md-12">
                <div class="title m-b-md">
                    <div class="box img card card-img flex-center position-ref full-height" >
                        <div class="box-body flex-center"><img src="img/logo/logoeduhub.png" width="60%" ></div>
                        <div class="links">
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
                <br>
                <div class=" col-md-4 text-center ">


                    <a type="button" href="/client-dashboard"><img src="img/logo/logo/institution.png"  class="thumbnail img-circle   "></a>

                    <a type="button" href="/client-dashboard" class="btn btn-danger btn-block btn-lg">Institution Dashboard</a>
                  </div>


                <div class=" col-md-4 text-center ">



                          <a type="button" href="/short/login"><img src="img/logo/logo/shortcourse.png" class="thumbnail img-circle   "  ></a>

                    <a type="button" href="/short/login" class="btn btn-danger btn-block btn-lg">Short Course Dashboard</a>


              </div>
                <div class=" col-md-4 text-center">


                        <a type="button" href="/student/login"><img src="img/logo/logo/student.png" class="thumbnail img-circle   " ></a>

                    <a type="button" href="/student/login" class="btn btn-danger btn-block btn-lg">Student Dashboard</a>
                </div>
                </div>
            </div>



@endsection
