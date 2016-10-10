@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class=""><a href="{{ url('/register') }}">Institution</a></li>
              <li class="active"><a href="{{ url('/short/register') }}">Short Course</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane " id="tab_1">

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="box panel panel-default">
                            <div class="panel-heading">Register</div>
                            <div class="panel-body">
                                @if(session('status'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{{ session('status') }}</li>
                                    </ul>
                                </div>
                                @endif
                                @if ($errors->has('status'))
                                <div class="alert alert-warning">
                                    <ul>
                                        <li>{{ $errors->first('status') }}</li>
                                    </ul>
                                </div>
                                @endif
                                <form class="form-horizontal" role="form" method="POST" action="{{ action('ShortController@postRegister') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-4 control-label">Description</label>

                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control" name="description" required>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('established') ? ' has-error' : '' }}">
                                        <label for="established" class="col-md-4 control-label">Established</label>

                                        <div class="col-md-6">
                                            <input id="established" type="text" class="form-control" name="established" required>

                                            @if ($errors->has('established'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('established') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                        <label for="location" class="col-md-4 control-label">Location</label>

                                        <div class="col-md-6">
                                            <input id="location" type="text" class="form-control" name="location" required>

                                            @if ($errors->has('location'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('location') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label for="location" class="col-md-4 control-label">Type</label>

                                        <div class="col-md-6">
                                            {{Form::select('type',$provider_types, null, ['placeholder' => 'Select a type...'])}}

                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password-confirm" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
