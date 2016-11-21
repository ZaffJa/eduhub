@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

@if(count($core_spm_subjects) > 0)
<div class="card">
    <div class="class-header" data-background-color="orange">
    <h2 class="title">SPM Result</h2>
    </div>
    <div class="card-content table-responsive table-full-width">
    <table class="table">
        <thead class="text-danger">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($core_spm_subjects as $result)
            <tr>
                <td>{{isset($result->subject) ? $result->subject->code : 'Error'}}</td>
                <td>{{isset($result->subject) ? $result->subject->name : 'Error'}}</td>
                <td>{{$result->grade}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! Form::button('Edit',['type'=>'button','class'=>'btn btn-warning btn_edit']) !!}
</div>
@else
<h3>You have not added your SPM resuls yet.</h3>
{!! link_to_action('Student\SpmController@create','Add',null,['class'=>'btn btn-default']) !!}
@endif

<div class="container edit-view" style="display:none">
   
    {!! Form::model($core_spm_subjects,['action' => 'Student\SpmController@update','autocomplete'=>'off']) !!}

        @include('student.partials.spm-result',['submitButton'=>'Update'])


    {!! Form::close() !!}
</div>




@endsection
