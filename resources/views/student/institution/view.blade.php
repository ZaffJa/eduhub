@extends('student.layout.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px;
            width: 45%;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        img {
            border-radius: 5px 5px 0 0;
        }

        .container {
            padding: 2px 16px;
        }
    </style>

    <h2>Recommended Courses based on your SPM results</h2>

    @foreach($courses as $index => $course)

        <div class="card">
            <div class="container">
                <h4><b><a href="{{ $course->website }}">{{ $course->name_en }}</a></b></h4>
                <p><a href="https://eduhub.my/institutions/v/{{ $course->institution->institution->slug }}/courses/">{{ $course->institution->institution->name or "Error" }}</a></p>
            </div>
        </div>

    @endforeach


    <h2>Offered Courses by Institutions</h2>

    @foreach($allCourses as $index => $course)

        <div class="card">
            <div class="container">
                <h4><a href="{{ $course->institution->institution->website }}" target="_blank">{{ $course->institution->institution->name or "Error" }}</a></h4>
                <h5><b><a href="https://eduhub.my/institutions/v/{{ $course->institution->institution->slug }}/courses/" target="_blank">{{ $course->name_en }}</a></b></h5>
            </div>
        </div>

    @endforeach
    <br>

    {{ $allCourses->render() }}


    Course level

    Faculty level

    Default level - those that not fill course requirement





@endsection