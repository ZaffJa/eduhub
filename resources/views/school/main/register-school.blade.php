@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

    {!! Form::open(['action' => 'School\SchoolController@store','autocomplete'=>'off']) !!}

    @include('school.partials._school-form')

{!! Form::close() !!}

@endsection