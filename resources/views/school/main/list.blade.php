@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
    <div class="row">
        <div class="col-md-3">

            <div class="row" style="border: 1px solid black">

                <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Search a school'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::select('type',$school_type, null,['class'=>'form-control','required','placeholder'=>'School Type']) }}
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-9">
            @foreach($schools as $school)
                <div class="col-md-3 col-xs-12 col-sm-12 col-lg-3" style="padding-top: 10px; border: 1px solid black;">
                    <a href="{{ action('School\SchoolController@edit',$school->id) }}">
                        {{ $school->name }} <br>
                        {{ $school->ppd }} <br>
                        {{ $school->address }} <br>
                        {{ $school->state }} <br>
                        {{ $school->city }} <br>
                        {{ $school->telephone }} <br>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection