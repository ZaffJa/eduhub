@extends('layouts.app') @section('content')

    <div class="col-lg-12">
            <div class="row">
              <div class="col-md-12">
                <div class="title m-b-md">
                    <div class="box img card card-img flex-center position-ref full-height" style="">
                        <div class="box-body"><img src="img/logo/logoeduhub.svg"></div>
                        <div class="links">
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
                <br>
                <div class=" col-md-6 ">
                    <a type="button" href="/client-dashboard" class="btn btn-danger btn-block btn-lg">Institution Dashboard</a>
                </div>
                <div class=" col-md-6 ">
                    <a type="button" href="/short/login" class="btn btn-danger btn-block btn-lg">Short Course Dashboard</a>
                </div>
            </div>


    </div>

@endsection
