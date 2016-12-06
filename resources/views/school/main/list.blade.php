@extends('school.layout.app') @section('title', 'Dashboard') @section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 alert alert-default">
                    <div class="form-group">
                        {{Form::text('name',null,['class'=>'form-control','placeholder'=>'Search a school'])}}
                    </div>

                    <form action="{{ action('School\SchoolController@filter') }}" method="get">
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ Form::select('type',$school_type, !empty($type) ? $type : null,['class'=>'form-control','id'=>'school_type','placeholder'=>'School Type']) }}
                        </div>
                    </form>

                    <form action="{{ action('School\SchoolController@filterState') }}" method="post">
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ Form::select('school_state',$states, !empty($school_state) ? $school_state: null,['class'=>'form-control','id'=>'school_state','placeholder'=>'School State']) }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if(count($schools) > 0)
                <div class="row">
                    @foreach($schools as $school)
                        <div class="alert alert-default alert-dismissible col-md-4 col-sm-12 col-xs-12 col-lg-3" style="margin-left: 3px;">
                            <strong>
                                <a href="{{ action('School\SchoolController@edit',$school->id) }}">
                                    {{ $school->name }} <br>
                                    {{ $school->ppd }} <br>
                                    {{ $school->address }} <br>
                                    {{ $school->state }} <br>
                                    {{ $school->city }} <br>
                                    {{ $school->telephone }} <br>
                                </a>
                                <button type="button" class="btn btn-danger btnDelete" data-href="{{ $school->id }}"
                                        style="width: 100%">Delete
                                </button>
                            </strong>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{ $schools->render()}}
                </div>
            @else
                <h3> No schools for this school type</h3>
            @endif
        </div>
    </div>



    <script src="/assets/js/bootstrap-notify.js"></script>
    <script src="/assets/js/bootbox.js"></script>

    <script>

        $('.btnDelete').on('click', function () {

            var close = $(this);
            var school;

            bootbox.confirm("Are you sure want to delete this record ?", function (result) {

                if (result === true) {

                    var jqxhr = $.get("/school/delete/" + close.data('href'), function () {
                        console.log("Sent");
                    })
                    .done(function (result) {

                        $.notify({
                            message: "Successfully deleted " + result
                        }, {
                            type: 'success'
                        });

                        close.closest('div').hide();
                    })
                    .fail(function () {
                        $.notify({
                            message: "An error occurred"
                        }, {
                            type: 'warning'
                        });

                    });
                }
            });
        });

        $('#school_type').on('change',function(){

            $(this).closest('form').submit();
        });

        $('#school_state').on('change',function(){

            $(this).closest('form').submit();
        });



    </script>
@endsection