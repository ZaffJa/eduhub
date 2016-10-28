@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

{!! Form::open(['action' => 'Student\SpmController@store','autocomplete'=>'off']) !!}

    @include('student.partials.spm-result',['submitButton'=>'Submit'])

{!! Form::close() !!}


@endsection
