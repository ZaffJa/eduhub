@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Add new course')
@section('content2')
<div class="box box-primary">


<style media="screen">
    .col-md-2 {
        text-align: center;
    }

    .row {
        padding-top: 10px;

    }
</style>
<div class="box-body">
<form class="" action="{{route('client.course.store')}}" method="post" autocomplete="off">

    <div class="row">
        <div class="col-md-2">
            Course Name
        </div>
        <div class="col-md-8">
        <div class="row">
        <div class="col-md-4">
            <input type="text" name="name_eng" placeholder="English Name">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ">
            <input type="text" name="name_ms" placeholder="Malay Name">
        </div>
      </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Faculty
        </div>
        <div class="col-md-1">
            {{ Form::select('faculty', $faculties,['class' => 'col-md-2']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Level
        </div>
        <div class="col-md-1">
            {{ Form::select('level', $levels) }}
        </div>

    </div>
    <div class="row">
    <div class="col-md-2">
            Mode
        </div>
        <div class="col-md-1">
            {{ Form::select('mode', $modes) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Period Min
        </div>
        <div class="col-md-1">
            <input type="number" name="period_value_min" placeholder="Min credit hour">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Period Max
        </div>
        <div class="col-md-1">
            <input type="number" name="period_value_max" placeholder="Max credit hour">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Credit Hour
        </div>
        <div class="col-md-4">
            <input type="text" name="credit_hours" placeholder="Credit hour needed to pass this course">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Duration
        </div>
        <!-- <div class="col-md-2">
            <input type="number" name="period" placeholder="Duration of study">
        </div> -->
        <div class="col-md-1">
            {{ Form::select('period_type', $period_type) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Qualification Entry
        </div>
        <div class="col-md-4">
            <input type="text" name="qualification" placeholder="Min qualification">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Approved
        </div>
        <div class="col-md-4">
            <input type="text" name="approved" placeholder="Approved">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Accredited
        </div>
        <div class="col-md-4">
            <input type="text" name="accredited" placeholder="Accredit">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Field
        </div>
        <div class="col-md-4">
            {{ Form::select('nec', $nec) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            MQA Reference No
        </div>
        <div class="col-md-4">
            <input type="text" name="mqa" placeholder="MQA Reference No">
        </div>
    </div>
<!--     <div class="row">
        <div class="col-md-2">
            Course Description
        </div>
        <div class="col-md-4">
            <input type="text" name="course-description" placeholder="Detailed description of the course">
        </div>
    </div> -->
    <div class="row">

            {{ csrf_field() }}
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
            <a href="{!! route('client.course.view') !!}" class="btn btn-warning">Cancel</a>
            <button type='submit' class='btn btn-success '>Submit</button>
        </div>

    </div>
</form>
</div>
</div>

@endsection
