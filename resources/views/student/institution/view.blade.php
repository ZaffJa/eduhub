@extends('student.layout.app')

@section('title', 'Dashboard')

@section('content')


    <div class="row ">

    <h2 class="title">Recommended Courses based on your SPM results</h2>
  <div class="col-md-12">
    <div class="row">
    @foreach($courses as $index => $course)
<div class="col-md-4">
        <div class="card">
            <div class="card-content">
                <h4><b><a href="{{ $course->website }}">{{ $course->name_en }}</a></b></h4>
                <p><a href="https://eduhub.my/institutions/v/{{ $course->institution->institution->slug }}/courses/">{{ $course->institution->institution->name or "Error" }}</a></p>
            </div>
        </div>
      </div>

    @endforeach
</div>


    <h2>Offered Courses by Institutions</h2>
  <div class="row">
    @foreach($allCourses as $index => $course)
<div class="col-md-4">
        <div class="card">
            <div class="card-content">
                <h4  class="title"><a href="{{ $course->institution->institution->website }}" target="_blank">{{ $course->institution->institution->name or "Error" }}</a></h4>
                <p class="category"><b><a href="https://eduhub.my/institutions/v/{{ $course->institution->institution->slug }}/courses/" target="_blank">{{ $course->name_en }}</a></b></h5>
            </div>

</div>
</div>
    @endforeach
    <br>
</div>
    {{ $allCourses->render() }}

  </div>
  </div>



@endsection
