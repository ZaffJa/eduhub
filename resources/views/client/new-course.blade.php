@extends('client.layout.app') @section('title', 'Dashboard') @section('content')
<style media="screen">
    .col-md-2 {
        text-align: center;
    }

    .row {
        padding-top: 10px;
        text-align: right;
    }
</style>

<form class="" action="{{route('client.post.course.detail')}}" method="post">
  <div class='row'>
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
  </div>
    <div class="row">
        <div class="col-md-2">
            Course Name
        </div>
        <div class="col-md-4">
            <input type="text" name="course-name-eng" placeholder="English Name">
        </div>
        <div class="col-md-4">
            <input type="text" name="course-name-ms" placeholder="Malay Name">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Faculty
        </div>
        <div class="col-md-2">
            {{ Form::select('faculty', $faculties,['class' => 'col-md-2']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Level
        </div>
        <div class="col-md-4">
            {{ Form::select('level', $levels) }}
        </div>
        <div class="col-md-2">
            Mode
        </div>
        <div class="col-md-4">
            {{ Form::select('mode', $modes) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Period
        </div>
        <div class="col-md-4">
            <input type="text" name="period" placeholder="Duration of study">
        </div>
        <div class="col-md-2">
            Credit Hour
        </div>
        <div class="col-md-4">
            <input type="text" name="credit-hour" placeholder="Min credit hour">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Qualification Entry
        </div>
        <div class="col-md-4">
            <input type="text" name="qualification-entry" placeholder="Min qualification">
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
            MQA Reference No
        </div>
        <div class="col-md-4">
            <input type="text" name="mqa" placeholder="MQA Reference No">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Course Description
        </div>
        <div class="col-md-4">
            <input type="text" name="course-description" placeholder="Detailed description of the course">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            Video Link
        </div>
        <div class="col-md-4">
            <input type="text" name="video-link" placeholder="Video link of course description">
        </div>
    </div>
    <div class="row">
        {{ csrf_field() }}
        <button type='submit' class='btn btn-lg btn-default '>Submit</button>
    </div>
</form>
@endsection
