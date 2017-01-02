@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

    <style>
        .truncate {
            /*white-space: nowrap;*/
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 155px;
        }
    </style>

<div class="row ">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header"  data-background-color="orange">
                <h2 class="title">Recommended Courses based on your SPM results</h2>
            </div>

            @if(count($courses) > 0)
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
            @else
                <div class="col-md-12">
                    <h4> We're sorry. It looks like there is no course suggestions available at the moment.</h4>
                </div>
            @endif
        </div>
    </div>

<div class="col-md-12">

    <div class="card" >
        <div class="card-header" data-background-color="red">
            <h2 class="title">Offered Courses by Institutions</h2>
        </div>
        <div class="card-content">
            @foreach($allCourses as $index => $course)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content " style="min-height: 110px">
                            <h4 class="title"><a href="{{ $course->institution->institution->website }}" target="_blank">{{ $course->institution->institution->name or "Error" }}</a></h4>
                            <p class="category"><b><a href="https://eduhub.my/institutions/v/{{ $course->institution->institution->slug }}/courses/" target="_blank">{{ $course->name_en }}</a></b></p>
                        </div>

                    </div>
                </div>
            @endforeach
            <br>
        </div>
        <div class="card-footer">
          <div class=" col-sm-8 col-sm-offset-3">
          {{ $allCourses->render() }}
          </div>
        </div>

    </div>
</div>

</div>



@endsection
