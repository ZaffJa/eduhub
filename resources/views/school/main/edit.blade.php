@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

    {!! Form::model($school, ['action' => ['School\SchoolController@edit', $school->id]]) !!}

        @include('school.partials._school-form')

    {!! Form::close() !!}

@endsection