@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <div class="form-group">
            {{Form::label('name', 'Name')}}
            <br>
            {{isset($user->name) ? $user->name : null}} 
        </div>

        <div class="form-group">
            {{Form::label('email', 'E-Mail Address')}} 
            <br>
            {{isset($user->email) ? $user->email : null}}
        </div>

        <div class="form-group">
            {{Form::label('address', 'Address')}}
            <br>
            {{isset($student->address) ? $student->address : null}} 
        </div>

        <div class="form-group">
            {{Form::label('school', 'Secondary School')}} 
            <br>
            {{isset($student->school) ? $student->school : null}} 
        </div>

        <div class="form-group">
            {{Form::label('phone', 'Phone No.')}} 
            <br>
            {{isset($student->phone) ? $student->phone : null}} 
        </div>

        <div class="form-group">
            {{Form::label('birthday', 'Birthday')}} 
            <br>
            {{isset($student->birthday) ? $student->birthday : null}} 
        </div>

        <a href="{{ action('Student\ProfileController@edit') }}"><button class="btn btn-default">Edit</button></a>

</div>
@endsection
