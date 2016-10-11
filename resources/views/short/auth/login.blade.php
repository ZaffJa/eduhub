@extends('layouts.app') @section('content')
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class=""><a href="{{ url('/login') }}">Institution Login</a></li>
              <li class="active"><a href="{{ url('/short/login') }}">Short Course Login</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane " id="tab_1">

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="box panel panel-default">
                            <div class="panel-heading">Short Course Login</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ action('ShortController@postLogin') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                                            <span class="help-block" style="color:red">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>

                                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                @if($errors->has('activate'))
                                <div class="alert alert-warning">
                                    <ul>
                                        <li>Please click this <a href="{{action('ShortController@resendActivateAccount',$errors->first('activate'))}}">link</a> to re-send activation email.</li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
              </div>
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
