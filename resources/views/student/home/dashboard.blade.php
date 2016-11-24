@extends('student.layout.app') @section('title', 'Dashboard') @section('content')


    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img"
                             src="{{isset(Auth::user()->student_profile_picture) ? $s3.Auth::user()->student_profile_picture->path : ''}}"/>
                    </a>
                </div>

                <div class="content">
                    <p class="card-content">
                        <dt>Name</dt>
                        <dd>{{$user->name}}</dd>
                        <hr>
                        <dt>Email</dt>
                        <dd>{{$user->email}}</dd>
                        <hr>
                        <dt>Address</dt>
                        <dd>{{$user->student->address or null}}</dd>
                        <hr>
                        <dt>Phone</dt>
                        <dd>{{$user->student->phone or null}}</dd>
                        <hr>
                        <dt>School</dt>
                        <dd>{{$user->student->school or null}}</dd>
                        <hr>
                        <dt>Birthday</dt>
                        <dd>{{$user->student->birthday or null}}</dd>
                        <hr>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Personality Test Result</h4>
                    <div style="text-align:center;">
                        <canvas id='graph'></canvas>
                    </div>
                </div>
                <div class="card-content table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                        <tr>
                            <th>Your score</th>
                            <th>Type of person</th>
                        </tr>
                        </thead>

                    </table>

                </div>
                <div class="card-footer">
                    <h5 class="footer">R = Realistic, A = Artistic, I = Investigative, E = Enterprising, S = Social, C =
                        Conventional</h5>
                </div>
            </div>
        </div>
    </div>


    @if($spm_results->count() > 0)
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="card card-profile">
                    <h4 class="card-title">Personality Test Result</h4>
                    <div class="content">
                        <span class="card-content">
                            @foreach($spm_results as $result)
                                <dt>{{ $result->subject->name }}</dt>
                                <dd>{{$result->grade}}</dd>
                                <hr>
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif




@endsection
