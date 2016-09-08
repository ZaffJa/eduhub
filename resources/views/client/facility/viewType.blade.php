@extends('client.layout.app')

@section('title', 'Facilities')

@section('content')
<div class="row">
  <div class="col-lg-1">
    <a href="#" style="color:black;font-size: 200%"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
  </div>

  <div class="col-lg-10">
    <div class="row">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header" style="background-color: #dd4b39">
            <h3 class="box-title" style="font-size:500%;color: white">Facilities</h3>
          </div>
        </div>
      </div>
    </div>
        
        <div classs="row"> 
          @if (session('status'))
            <h2>
              {{session('status')}}
            </h2>
          @endif
        </div>
        
        @foreach(array_chunk($facility_types->all(), 3) as $typeRow)
        <div class="row">
          @foreach($typeRow as $type)
            <div class="col-md-4">
              <a href="{!! action('FacilityController@view', $type->id) !!}"> 
                <div class="box img card card-img ">
                  <!-- /.box-header -->
                  <div class="box-body">
                        <div class="img ">
                          <img src="http://www.bonappetit.com/wp-content/uploads/2016/02/dropbox-cafeteria.jpg" alt="First slide">

                          <div class="carousel-caption">
                            {!! $type->name !!}
                          </div>
                        </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </a>
            </div>
          @endforeach
        </div>
        @endforeach
    </div>
  </div>
@endsection