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

    {{ Form::model($user, ['action' => ['Student\ProfileController@update', $user->id],'files' => true]) }}

        @include('student.partials.profile', ['profileHeaderText'=>'Update', 'submitBtnText'=>'Update'])

    {{ Form::close() }}
</div>
@endsection
