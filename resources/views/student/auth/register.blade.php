@extends('layouts.app') @section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a href="{{ url('/register') }}">Institution</a></li>
                <li class=""><a href="{{ url('/short/register') }}">Short Course</a></li>
                <li class="active"><a href="{{ url('/student/register') }}">Student</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane " id="tab_1">

                </div>
                <div class="tab-pane " id="tab_2">

                </div>
                <div class="tab-pane active" id="tab_3">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="box panel panel-default">
                                <div class="panel-heading">Register</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ action('Student\RegisterController@store') }}" autocomplete="off">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus> @if ($errors->has('name'))
                                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required> @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span> @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <hr>

                                            <label for="alternative" class="col-md-4 control-label">Or Signup using</label>

                                            <div class="col-md-8 col-md-offset-4">
                                                <div id="alternative">
                                                    <a href="/student/redirect/facebook" id="facebook" class="btn btn-social btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> Facebook
                            </a>
                                                    <a href="/student/redirect/google" id="google" class="btn btn-social btn-google btn-round sharrre"><i class="fa fa-google"></i> Google<div class="ripple-container"></div>
                            </a>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.tab-pane -->

                <!-- /.tab-pane -->

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>



@endsection
