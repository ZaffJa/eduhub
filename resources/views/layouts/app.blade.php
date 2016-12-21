<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eduhub.my</title>
    <link rel="icon" sizes="192x192" href="/img/logo/LOGO-U-01.png">
    <!-- Styles -->
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/client/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/client/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="/client/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <script src="/client/plugins/jQuery/jquery-2.2.3.min.js"></script>
    {{--<script src="/client/dist/js/app.min.js"></script>--}}
    <script src="/assets/js/bootbox.min.js"></script>
    <script src="/assets/js/bootstrap-notify.js"></script>




    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="hold-transition skin-red sidebar-mini">
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand " href="{{ url('/') }}" type="button">
                <img alt="Brand" src="/img/logo/LOGO-U.svg" height="150%" weight="150%">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" type="button" class="btn btn-outline">Login</a></li>
                    <li><a href="{{ url('/register') }}" type="button" class="btn btn-outline">Register</a></li>
                @else
                    <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" role="button" class="btn">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class='row'>
                @if(count($errors) > 0)
                    {{--<div class="alert alert-danger alert-dismissible">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                        {{--<h4><i class="icon fa fa-ban"></i> Alert!</h4>--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    @foreach ($errors->all() as $error)
                        <script>
                            $.notify({
                                // options
                                message: "{{ $error }}"
                            }, {
                                // settings
                                type: 'danger'
                            });
                        </script>
                    @endforeach

                @endif
                @if(isset($status))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4> {{ $status }}
                    </div>
                @endif
            </div>
            <div class='row'>

                <div class=" col-md-8 col-md-offset-2">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

</body>
</html>
