@extends('client.layout.app')


@section('content')
<div class="row">
  <!-- <div class="col-lg-1">
    <a href="#" style="color:black;font-size: 200%"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
  </div> -->

<!--  <div class="col-lg-10">-->
    <div class="row">
      <div class="col-lg-12">
        <div class="box">
            <div class="box-header" style="background-color: #dd4b39">

              <h3 class="box-title" style="font-size:300%;color: white"> @yield('headbar') </h3>
            </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        @foreach ($errors->all() as $error)

          <p>
            Error Message
            <br/>
          <p>

        @endforeach

        @if (session('status'))
        <label>
          {{session('status')}}
        </label>
        @endif
        @yield('content2')
        </div>
      </div>
    </div>
  <!--</div>-->

@endsection
