@extends('layouts.app')

    @section('content')
<div class="col-lg-12">
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                <div class="box img card card-img " style="">
                    <div class="box-body"><img src="img/logo/logoeduhub.svg"></div>
                    <div class="links">
                    </div>
                </div>
            </div>
            <div class="row">
              <br>
              <div class=" col-md-6 ">
                <a type="button" href="/client-dashboard" class="btn btn-default btn-block btn-lg">Institution Dashboard</a>
              </div>
              <div class=" col-md-6 ">
                <a type="button" href="/short/login" class="btn btn-default btn-block btn-lg">Short Course Dashboard</a>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
