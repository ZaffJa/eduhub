@extends('short.layout.headerApp')


@section('title', 'Short Course')
@section('headbar', 'Short Courses')
@section('content2')
<div class="box box-primary">
  <div class="box-header">
    <div class="col-md-2">
    <h4>Short Courses</h4>
    </div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="table table-bordered table-striped">
          @if($course != null || $course != '')
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name English</th>
                <th>Name Malay</th>
                <th>Fee</th>
                <th>Location</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
                @foreach($course as $c)
                <tr>
                  <td>{{ $c->name_en }}</td>
                  <td>{{ $c->name_ms }}</td>
                  <td>{{ $c->price }}</td>
                  <td>{{ $c->location }}</td>
                  <td></td>
                </tr>  
                @endforeach
            </tbody>
          </table>
          @else
            There is no short course.
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer">


  </div>

</div>

  <a href=" {!! route('short.course.add') !!} " class="float">
      <i class="fa fa-plus my-float"></i>
  </a>
  <div class="label-container">
      <div class="label-text">Add Course</div>
      <i class="fa fa-arrow- label-arrow"></i>
  </div>

@endsection
