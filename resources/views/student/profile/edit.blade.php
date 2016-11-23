@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

<div class="form-group">
    {{Form::label('name', 'Name')}} {{Form::text('name',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('email', 'E-Mail Address')}} {{Form::text('email',null,['class'=>'form-control'])}}
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
    <div id="map"></div>

{!! Form::submit($submitBtnText,['type'=>'button','class'=>'btn btn-default']) !!} {!! Form::button('Cancel',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}

