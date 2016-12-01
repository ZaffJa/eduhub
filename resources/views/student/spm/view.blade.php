@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
@if(count($core_spm_subjects) > 0)
<div class="card ">
    <div class="card-header" data-background-color="orange">
        <h2 class="title">&nbsp;SPM Result</h2>
    </div>
    <div class="card-content ">
        <table class="table table-responsive table-full-width">
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
</div>
@else
<h3>You have not added your SPM results yet.</h3>
{!! link_to_action('Student\SpmController@create','Add',null,['class'=>'btn btn-default']) !!}
@endif

<div class="container edit-view" style="display: none">

    {!! Form::model($core_spm_subjects,['action' => 'Student\SpmController@update','autocomplete'=>'off']) !!}

        @include('student.partials.spm-result',['submitButton'=>'Update'])


    {!! Form::close() !!}
</div>
</div>
</div>

    <script>
        $('.btn_edit').on('click', function() {
            $('.index-view').hide();
            $('.edit-view').show();
        });

        $('.btn_view').on('click', function() {
            $('.edit-view').hide();
            $('.index-view').show();

        });
    </script>

@endsection
