@extends('client.layout.headerLayout')

@section('title', 'Facility')
@section('headbar', 'Facility')
@section('content2')


<div class="row">



        @foreach(array_chunk($facility_types->all(), 3) as $typeRow)
        <div class="row">
          @foreach($typeRow as $type)
            <div class="col-md-4">

              <a href="{!! action('FacilityController@view', $type->id) !!}">
                <div class="box-body">
                  <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background-image: url('/img/default/{!! $type->icon !!}')">
                    <div class="mdl-card__title mdl-card--expand"  >

                    </div>
                      <div class="mdl-card__actions" >
                        <span class="demo-card-image__filename">{!! $type->name !!}</span>
                      </div>
                  </div>
                </div>
            </a>
              
            </div>
          @endforeach
        </div>
        @endforeach

                      <a href="{{route('faci.addAllType')}}" class="float">
                      <i class="fa fa-plus my-float"></i>
                    </a>
                      <div class="label-container">
                        <div class="label-text">Add facilities</div>
                        <i class="fa fa-arrow- label-arrow"></i>

                      </div>


</div>
@endsection
