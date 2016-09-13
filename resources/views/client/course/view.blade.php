@extends('client.layout.app')

@section('title', 'Facilities')

@section('content')


@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif

@if ($faculty->isEmpty())
  <p> There are no facilities. </p>
@else
  <table>
    <thead>
      <tr>
      <th>Faculty</th>
      <th>Level</th>
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
      @foreach($faculty as $f)
        @foreach($f->courses as $c)
      <tr>
        <td> {{$f->name}} </td>
        <td> {{$c->level->name}}</td>
        <td> {{$c->mode->name}}</td>
        <td> {{$c->name_en}}</td>
        <td> {{$c->name_ms}}</td>
        <td> {{$c->period_value_min}}</td>
        <td> {{$c->period_value_max}}</td>
        <td> {{$c->credit_hours}}</td>
        <td> {{$c->approved}}</td>
        <td> {{$c->accredited}}</td>
        <td> {{$c->commencement}}</td>
        <td> {{$c->qualification}}</td>
        <td> {{$c->mqa_reference_no}}</td>

        @endforeach
      @endforeach
    <tbody>
      {{$faculty->render()}}

@endif
<a href="{!! route('client.course.add')!!}">Add</a>

@endsection
