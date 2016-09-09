@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Facility')
@section('content2')

<style type="text/css">
#bg, #search-bg {
  background-image: url('/media/freelancer-desk.jpg');
  background-repeat: no-repeat;
  background-size: 1080px auto;
}

#bg {
  background-position: center top;
  padding: 70px 90px 120px 90px;
}

#search-container {
  position: relative;
}

#search-bg {
  /* Absolutely position it, but stretch it to all four corners, then put it just behind #search's z-index */
  position: absolute;
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
  z-index: 99;

  /* Pull the background 70px higher to the same place as #bg's */
  background-position: center -70px;

  -webkit-filter: blur(10px);
  filter: url('/media/blur.svg#blur');
  filter: blur(10px);
}

#search {
  /* Put this on top of the blurred layer */
  position: relative;
  z-index: 100;
  padding: 20px;
  background: rgb(34,34,34); /* for IE */
  background: rgba(34,34,34,0.75);
}

@media (max-width: 600px ) {
  #bg { padding: 10px; }
  #search-bg { background-position: center -10px; }
}

#search h2, #search h5, #search h5 a { text-align: center; color: #fefefe; font-weight: normal; }
#search h2 { margin-bottom: 50px }
#search h5 { margin-top: 70px }
</style>
<div class="row">




        @foreach(array_chunk($facility_types->all(), 3) as $typeRow)
        <div class="row">
          @foreach($typeRow as $type)
            <div class="col-md-4">
              <a href="{!! action('FacilityController@view', $type->id) !!}">
                <div class="box img card card-img ">
                  <!-- /.box-header -->
                  <div class="box-body">
                        <div class="img ">
                          <img src="/img/default/{!! $type->icon !!}" alt="First slide">

                          <div class="carousel-caption">
                            <div id="search-container">
                              <div id="search-bg"></div>
                              <div id="search">
                                  <h4 style="font-size: 200%">{!! $type->name !!}</h4>
                              </div>
                            </div>
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

                      <a href="{!! action('FacultyController@add') !!}" class="float">
                      <i class="fa fa-plus my-float"></i>
                      </a>
                      <div class="label-container">
                        <div class="label-text">Add Faculty</div>
                        <i class="fa fa-arrow- label-arrow"></i>

    </div>

@endsection
