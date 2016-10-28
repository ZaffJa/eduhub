@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

@if(count($core_spm_subjects) > 0)
<div class="container index-view">
    <h2>SPM Result</h2>
    <table class="table">
        <thead>
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
<h1>You have not added your SPM resuls yet.</h1>
<h5>Click {!! link_to_action('Student\SpmController@create','here') !!} to add your result.</h5>
@endif

<div class="container edit-view" style="display:none">
    <h2>Edit SPM Result</h2>
    {!! Form::model($core_spm_subjects,['action' => 'Student\SpmController@update','autocomplete'=>'off']) !!}

        @include('student.partials.spm-result',['submitButton'=>'Update'])

        {!! Form::button('Cancel',['type'=>'button','class'=>'btn btn-warning btn_view']) !!}

    {!! Form::close() !!}
</div>




@endsection
