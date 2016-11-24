@extends('student.layout.app') @section('title', 'Dashboard') @section('content')

    <div class="row">
	<div class="col-md-4 col-md-offset-2">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="">
					<img class="img-circle thumbnail" src="{{isset(Auth::user()->student_profile_picture) ? $s3.Auth::user()->student_profile_picture->path : 'img/avatar/boy-512-03.png'}}" />
				</a>
			</div>

			<div class="content">
				<!-- <h6 class="category text-gray">CEO / Co-Founder</h6> -->
				<h4 class="card-title">{{Auth::user()->name}}</h4>
				<span class="card-content">
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
                </span>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-content" data-background-color="green">
				<div id="container" style="min-width: 200px; max-width: 600px; height: 400px; margin: 0 auto"></div>
			</div>
			<div class="card-footer">
				<h5>R = Realistic, A = Artistic, I = Investigative, E = Enterprising, S = Social, C = Conventional</h5>
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
