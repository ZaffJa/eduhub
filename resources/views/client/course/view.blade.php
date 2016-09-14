@extends('client.layout.headerLayout')

@section('title', 'Course')
@section('headbar', 'Courses')
@section('content2')
<div class="box box-primary">
<div class="box-header">
@if (session('status'))
  <label>
    {{session('status')}}
  </label>
@endif
</div>

@if ($faculty->isEmpty())
  <p> There are no facilities. </p>
@else

  <div class="box-body">
      {{$faculty->render()}}
  <table class="table table-bordered table-hover dataTable" style="width:100%">
    <thead>
      <tr>
      <th>Faculty</th>
      <th>Level</th>
      <th>Mode</th>
      <th>Name (English)</th>
      <th>Name (Malay)</th>
      <th>Credit hour</th>
      <th>View</th>
      <tr>
    </thead>
    <tbody>
      @foreach($faculty as $f)
        @foreach($f->courses as $c)


      <tr>
        <td> {{$f->name}} </td>
        <td> {{$c->level->name}}</td>
        <td> {{$c->mode->name}}</td>
        <td> {{$c->name_en}}</td>
        <td> {{$c->name_ms}}</td>
        <td> {{$c->credit_hours}}</td>
        <td>
          <a href=" {!! route('client.course.view.course', $c->id)  !!} " class="btn btn-primary-outline">
            View
          </a>
        </td>
      </tr>

        @endforeach
      @endforeach
    </tbody>

    </table>
    <div>
      {{$faculty->render()}}
@endif
</div>
<a href="{!! route('client.course.add') !!}" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
  <div class="label-text">Add Course</div>
  <i class="fa fa-arrow- label-arrow"></i>


</div>
@endsection
