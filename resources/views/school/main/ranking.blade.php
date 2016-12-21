@extends('school.layout.app') @section('title', 'Dashboard') @section('content')


    {!! Form::model($school,['action' => 'School\SchoolController@postRanking','autocomplete'=>'off']) !!}

    @include('school.partials._ranking')

    {!! Form::close() !!}

@endsection