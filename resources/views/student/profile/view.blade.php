@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
<style media="screen">

    img {
        display: block;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
</style>
<div class="container index-view">

    <dl>
        <a href="#" class="shader">
            <img class="round" src="{{$s3.Auth::user()->student_profile_picture->path}}"/>
        </a>
        <dt>Name</dt>
        <dd>{{$user->name}}</dd>
        <hr>
        <dt>Email</dt>
        <dd>{{$user->email}}</dd>
        <hr>
    </dl>

    {!! Form::button('Edit',['type'=>'button','class'=>'btn btn-warning btn_edit']) !!}

</div>

<div class="container edit-view" style="display:none">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif {{ Form::model($user, ['action' => ['Student\ProfileController@update', $user->id],'files' => true]) }} @include('student.partials.profile', ['profileHeaderText'=>'Update', 'submitBtnText'=>'Update']) {{ Form::close() }}
</div>
@endsection
