<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/material-dashboard/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2016 07:40:02 GMT -->

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png"/>
    <link rel="icon" sizes="192x192" href="/img/logo/logo/student.png">
    <title>Sekolah</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <!--  Material Dashboard CSS    -->
    <link href="/assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="../../../assets/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
          type='text/css'>

    <!--   Core JS Files   -->
    <script src="/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="/assets/js/jquery-ui.js" type="text/javascript"></script>

    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
    <!-- Tether for Bootstrap -->
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <link rel="stylesheet" href="/css/jquery-ui.css">


    <script src="/assets/js/bootbox.js"></script>


    <!--  Notifications Plugin    -->
    <script src="/assets/js/bootstrap-notify.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="/assets/js/material-dashboard.js"></script>

    <!--   Sharrre Library    -->
    {{--<script src="/assets/js/jquery.sharrre.js"></script>--}}

    {{--<script src="/assets/js/demo.js"></script>--}}
    @yield('header-css')
</head>

<body>
{{--@include('school.partials._modal')--}}
<div class="wrapper">

    <div class="main-panel main-panel-sub">
        <nav class="navbar navbar-default navbar-absolute navbar-school" style=" border-top: 4px solid #DA2D2D ;">
            <div class="container-fluid">
                <div class="navbar-header">
                    @if(auth()->user())
                    <button type="button" class=" navbar-toggle hidden-md-up" >

                        <a href="{{ action('School\SchoolController@register') }}" style="color: black; float: right;">
                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                        </a>

                    </button>
                    @endif
                    <a class="navbar-brand" href="/school">
                        <img src="/img/logo/logonav.png"  style="display: inline-block; max-width: 130px; background-color: white;">

                    </a>
                </div>
                @if(auth()->user())
                    <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                        <li><a href="{{ action('School\SchoolController@register') }}">
                                <i class="fa fa-pencil fa-fw" aria-hidden="true" style="color: black"></i>
                            </a>
                        </li>
                    </ul>
                @endif




            </div>
        </nav>
        <div class="content">
            @include('errors.form')
            @include(('success.status'))
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">

                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.eduhub.my">eduhub.my</a>, made with love for a better future
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
<!-- Mirrored from demos.creative-tim.com/material-dashboard/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2016 07:41:19 GMT -->

</html>
