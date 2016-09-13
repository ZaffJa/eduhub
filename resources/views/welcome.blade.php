<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eduhub.my</title>

    <link rel="icon" sizes="192x192" href="/img/logo/LOGO-U-01.png">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css" media="screen" title="no title" charset="utf-8">
    <script src="http://localhost:8000/livereload.js" charset="utf-8"></script>
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
            height: 100vh;
            margin: 0
        }

        .full-height {
            height: 100vh
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center
        }

        .position-ref {
            position: relative
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px
        }

        .content {
            text-align: center
        }

        .title {
            font-size: 84px
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase
        }

        .m-b-md {
            margin-bottom: 30px
        }

        rd {
            color: black
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if(Auth::user() == null)
          <div class="top-right links"> <a href="{{ url('/login') }}">Login</a> <a href="{{ url('/register') }}">Register</a></div>
        @else
          <div class="top-right links"> <a href="{{ route('client.dashboard') }}">Dashboard</a></div>
        @endif
        <div class="content">
            <div class="title m-b-md">
                <div class="box img card card-img ">
                    <div class="box-body"><img src="img/logo/logoeduhub.svg"></div>
                </div>
            </div>
            <div class="links">
                <h1 class="">DASHBOARD</h1>
            </div>
        </div>
    </div>
</body>

</html>
