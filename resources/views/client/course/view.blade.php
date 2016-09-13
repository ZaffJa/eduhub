@extends('client.layout.app')

@section('title', 'Facilities')

@section('content')


@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif

@if ($courses->isEmpty())
  <p> There are no facilities. </p>
@else
  <table>
    <thead>
      <tr>
      <th>Faculty</th>
      <th>Level</th>
      <th>Period</th>
      <th>Mode</th>
      <th>Name (English)</th>
      <th>Name (Malay)</th>
      <th>Period min </th>
      <th>Period max</th>
      <th>Credit hour</th>
      <th>Approved</th>
      <th>Accredited</th>
      <th>Commencement</th>
      <th>Qualification</th>
      <th>MQA Reference Number</th>
      <tr>
    </thead>
      @foreach($courses as $course)
      <tr>
        <td> {{$course->faculty->name}} </td>
        <td> {{$course->level->name}} </td>
        <td>
          @foreach($periodTypes as $periodType)
            @if($periodType->id == $course->period_type_id)
              {{$periodType->name}}
            @endif
          @endforeach
        </td>
        <td> {{$course->mode->name}}</td>
        <td> {{$course->name_en}}</td>
        <td> {{$course->name_ms}}</td>
        <td> {{$course->period_value_min}}</td>
        <td> {{$course->period_value_max}}</td>
        <td> {{$course->credit_hours}}</td>
        <td> {{$course->approved}}</td>
        <td> {{$course->accredited}}</td>
        <td> {{$course->commencement}}</td>
        <td> {{$course->qualification}}</td>
        <td> {{$course->mqa_reference_no}}</td>
        <td><a href="{{ route('client.course.edit', $course->id) }}"><button>Edit</button></td>
        <td>
          <a href="{{ route('client.course.delete', $course->id) }}">
          Delete
          </a>
        </td>
      @endforeach
    <tbody>

@endif
<a href="{!! route('client.course.add')!!}">Add</a>

@endsection