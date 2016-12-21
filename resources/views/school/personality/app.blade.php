<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="/personality/assets/css/style.css"/>
    <title>Paper Bootstrap Wizard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- CSS Files -->
    <link href="/personality/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/personality/assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/personality/assets/css/demo.css" rel="stylesheet" />

    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/personality/assets/css/themify-icons.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" style="border-top: 3px solid red">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/sekolah" class="navbar-brand">
                <div class="logo-container">
                    <div class="logo">
                        <img src="/img/logo/logocvr.png" style="max-width: 100px;">
                    </div>

                </div>
            </a>
        </div>


    </div><!-- /.container-->
</nav>

<div class="image-container set-full-height" style="background-image: url('/personality/assets/img/paper-3.jpeg')">
    <!--   Creative Tim Branding   -->

    <br>
    <br>


    <!--  Made With Paper Kit  -->
    <a href="/sekolah" class="made-with-pk">
        <div class="brand">EH</div>
        <div class="made-with"> <strong>Kembali Ke Sekolah</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @yield('content')
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Eduhub.my</a>
        </div>
    </div>
</div>

</body>


<script>
    function goBack() {
        window.history.back();
    }
</script>
<!--   Core JS Files   -->
<script src="/personality/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="/personality/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/personality/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="/personality/assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/     -->
<script src="/personality/assets/js/jquery.validate.min.js" type="text/javascript"></script>

</html>
