@extends('student.layout.app') @section('title', 'Dashboard') @section('content')
    <style>
        a {
            color: black;
        }
    </style>
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h2 class="title">Institutions accepting enrollment</h2>
        </div>
        @if(count($institutions) > 0)
            @foreach($institutions as $institution)
                @if(!empty($institution->status == 1))
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content " style="min-height: 140px;text-align: center">
                                <h2 class="title">
                                    <a href="http://{{ $institution->website or null }}"
                                       target="_blank">
                                        {{ $institution->name or "Error" }}
                                    </a>
                                </h2>
                            </div>
                            <div class="card-footer text-muted" style="text-align: center">
                                <a class="btn btn-danger btn-sm" style="width: 100%"
                                   href="{{ action('Student\EnrollmentController@view',[$institution->slug]) }}">
                                    <i class="fa fa-keyboard-o"></i> Enroll
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="col-md-12">
                <h4> We're sorry. It looks like there is no course suggestions available at the moment.</h4>
            </div>
        @endif
    </div>
    <div class="card">
        <div class="col-md-6">
            <a class="btn btn-primary btn-lg" style="width: 100%" href="https://eduhub.my/institutions/list" target="_blank">View
                all Institution</a>
        </div>
        <div class="col-md-6">
            <a class="btn btn-info btn-lg" style="width: 100%" href="https://eduhub.my/full-courses/" target="_blank">View
                course categories</a>
        </div>
    </div>



@endsection
