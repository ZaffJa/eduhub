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

    <h2>Edit profile</h2>

    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            {{Form::label('name', 'Name')}} 
            {{Form::text('name',isset($user->name) ? $user->name : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('email', 'E-Mail Address')}} 
            {{Form::text('email',isset($user->email) ? $user->email : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('address', 'Address')}} 
            {{Form::text('address',isset($student->address) ? $student->address : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('school', 'Secondary School')}} 
            {{Form::text('school',isset($student->school) ? $student->school : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('phone', 'Phone No.')}} 
            {{Form::text('phone',isset($student->phone) ? $student->phone : null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('birthday', 'Birthday')}} 
            {{Form::date('birthday',isset($student->birthday) ? $student->birthday : null,['class'=>'form-control'])}}
        </div>

        <div class="input-group">
            <label class="input-group-btn">
                <span class="btn btn-primary">
                    Edit Profile Picture&hellip;
                    <input type="file" style="display: none;" name="image">
                </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>

        {{csrf_field()}}

        <a href="{{ action('Student\ProfileController@update') }}"><button class="btn btn-default">Update</button></a>

        <a href="{{ action('Student\ProfileController@index') }}" class="btn btn-warning btn_view">Cancel</a>

    </form>

</div>
@endsection
