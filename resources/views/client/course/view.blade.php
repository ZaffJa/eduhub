@extends('client.layout.headerLayout') @section('title', 'Course') @section('headbar', 'Courses') @section('content2')
<div class="box box-primary">
    @if ($institutionCourses->isEmpty())
    <p> There are no facilities. </p>
    @else
    <div class="box-body">
        <form action="{{route('client.course.search.result')}}" method="post">
            <input type="text" placeholder="Search a course" name="search_course" id="search" style="width:70%">
            <button type='submit' class='btn btn-md btn-default '>Search</button> {{csrf_field()}}
        </form>

        <div class="box-body table-responsive no-padding">
        <table class="table table-bordered table-hover" style="width:100%">
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
                @foreach($institutionCourses as $ic)
                    @foreach($courses as $c)
                        @if($ic->course_id == $c->id)
                        <tr>
                            <td>
                                @foreach($facCourses as $fc)
                                    @if($fc->id == $c->faculty_id)
                                        {{$fc->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td> {{$c->level->name}} </td>
                            <td> {{$c->mode->name}} </td>
                            <td> {{$c->name_en}} </td>
                            <td> {{$c->name_ms}} </td>
                            <td> {{$c->credit_hours != null ? $c->credit_hours : "Credit hours not added"}} </td>
                            <td><a href=" {!! route('client.course.view.course', $c->id)  !!} " class="btn btn-info">View</a></td>
                        </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
      </div>
        <div>
            {{$institutionCourses->render()}} @endif
        </div>
      </div>

        <a href="{!! route('client.course.add') !!}" class="float">
            <i class="fa fa-plus my-float"></i>
        </a>
        <div class="label-container">
            <div class="label-text">Add Course</div>
            <i class="fa fa-arrow- label-arrow"></i>
        </div>

        <script type="text/javascript">
            $('#search').autocomplete({
                source: "{{route('client.course.search')}}"
            });
        </script>
        @endsection
