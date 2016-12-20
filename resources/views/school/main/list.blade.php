@extends('school.layout.app') @section('title', 'Dashboard') @section('content')

    <style>

        #cariSekolah {
            border-bottom: 1px solid black;
        }

        #school_type {
            border: 1px solid black;
        }

        #school_state {
            border: 1px solid black;
        }
        #school_streams{
            border: 1px solid black;
        }
    </style>

    <div class="row">
        <div class="col-lg-3  col-lg-offset-1 ">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 alert alert-default">
                    <h3><strong>Tapis Sekolah</strong></h3>
                    <form action="{{ action('School\SchoolController@postSearch') }}" method="post">
                    <div class="row">
                            <div class="col-md-8 col-lg-8 col-sm-10">
                                    {{Form::text('name',null,['class'=>'form-control input-box','placeholder'=>'Cari sekolah','id'=>'cariSekolah'])}}
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <button type="submit" class="btn btn-info btn-sm" style="top:25px;left:0px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>

                        {{ csrf_field() }}
                    </form>

                    <form action="{{ action('School\SchoolController@filter') }}" method="get">
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ Form::select('type',$school_type, !empty($type) ? $type : null,['class'=>'form-control','id'=>'school_type','placeholder'=>'Jenis Sekolah']) }}
                        </div>
                    </form>

                    <form action="{{ action('School\SchoolController@filterState') }}" method="post">
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ Form::select('school_state',$states, !empty($school_state) ? $school_state: null,['class'=>'form-control','id'=>'school_state','placeholder'=>'Negeri    ']) }}
                        </div>
                    </form>

                    <form action="{{ action('School\SchoolController@filterStream') }}" method="post">
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ Form::select('school_stream',$streams, !empty($streams) ? $streams: null,['class'=>'form-control','id'=>'school_streams','placeholder'=>'Aliran    ']) }}
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
            <div class="col-md-10 col-md-offset-1  alert alert-default alert-dismissible">

                    <div class="text-center">
                        <h2 class="title">Ujian Personaliti</h2>
                        <div class=" text-center">
                            <div class="col-lg-12">
                            <img src="/img/icon/personality.png" style="height: 60%; width: 60%"/>
                            </div>
                            <div class="col-lg-12">
                                <br>
<p>Ambil ujian personaliti anda.</p>
                            <a href="{{action('School\PublicPersonalityController@set1')}}" class="btn btn-info btn-round text-wrap" >Ambil Ujian</a>

                            </div>                        </div>

                    </div>

            </div>

            </div>

        </div>
        <div class="col-lg-7 col-lg-offset-1">
            @if(count($schools) > 0)
                <div class="row">
                    @foreach($schools as $school)

                        <div class="alert alert-default alert-dismissible col-md-4 col-sm-12 col-xs-12 col-lg-3 card-size" id="cardSchool">

                            <strong>
                                <a href="{{ action('School\SchoolController@viewSchool',$school->slug) }}"  style="word-wrap: break-word; text-justify: auto">
                                    {{ $school->name }} <br>
                                    {{ $school->ppd }} <br>
                                    {{ $school->address }} <br>
                                    {{ $school->state }} <br>
                                    {{ $school->city }} <br>
                                    {{ $school->telephone }} <br>
                                </a>

                            </strong>
                                @if(auth()->user() !== null && auth()->user()->hasRole('school'))
                                    <button type="button" class="btn btn-danger btnDelete" data-href="{{ $school->id }}"
                                            style=" width: 100%">Delete
                                    </button>
                                @endif

                        </div>

                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    {{ $schools->render()}}
                    </div>
                </div>
            @else
                <h3> Tiada sekolah untuk carian ini</h3>
            @endif
        </div>
    </div>

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
                                    message: "<strong>Successfully deleted " + result + "</strong>"
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

        $('#school_type').on('change', function () {

            $(this).closest('form').submit();
        });

        $('#school_state').on('change', function () {

            $(this).closest('form').submit();
        });

        $('#school_streams').on('change', function () {

            $(this).closest('form').submit();
        });

        $('#cariSekolah').autocomplete({
            source: '{{ action('School\SchoolController@search') }}'
        });
        $(window).on('load', function() {
            if($(window).width() > 1000) {


                $('.card-size-xs').each(function(){            //iterates all elements having stick class
                    $(this).addClass('card-size');
                    $(this).removeClass('card-size-xs');//inside the callback the 'this' is the current html element. etc ...
                });
            }else{
                $('.card-size').each(function(){            //iterates all elements having stick class
                    $(this).addClass('card-size-xs');
                    $(this).removeClass('card-size');//inside the callback the 'this' is the current html element. etc ...
                });
            }
        });
        $(window).on('resize', function() {
            if($(window).width() > 1000) {


                $('.card-size-xs').each(function(){            //iterates all elements having stick class
                    $(this).addClass('card-size');
                    $(this).removeClass('card-size-xs');//inside the callback the 'this' is the current html element. etc ...
                });
            }else{
                $('.card-size').each(function(){            //iterates all elements having stick class
                    $(this).addClass('card-size-xs');
                    $(this).removeClass('card-size');//inside the callback the 'this' is the current html element. etc ...
                });
            }
        })


    </script>
@endsection