<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>eduhub.my - @yield('title')</title>
    <link rel="icon" sizes="192x192" href="/img/logo/LOGO-U-01.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    <!-- <link rel="stylesheet" href="/css/material.min.css"> -->

    <!-- jQuery 2.2.3 -->
    <script src="/client/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/client/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/client/dist/js/app.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    @yield('header-css')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class=" skin-red sidebar-toggle">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            <a href="/client-dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Client</b> Dashboard</span>
            </a>
            <nav class="navbar navbar-static-top">

                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">

                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                                <i class="fa fa-cog"></i><span class="hidden-xs">{{ Auth::user()->institution != null ? Auth::user()->institution->name : 'Not Associated with Instititution'}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/img/logo/logo_uthm.png" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->institution != null ? Auth::user()->institution->name : 'Not Associated with Instititution'}}
                                        <small>Member since {{Auth::user()->created_at->diffForHumans()}}</small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/client-dashboard/edit-profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Sign out</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
            <!-- Logo -->


            <!-- Header Navbar -->

        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/client/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name}}
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">

                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">

                    @if(Auth::user()->institution != null)
                    <li class="treeview">
                        <a href="#"><i class="fa fa-book"></i> <span>Courses</span>
                          <span class="pull-right-container">

                          </span>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="/client-dashboard/faculty"><i class="fa fa-building"></i> <span>Faculties</span>
                          <span class="pull-right-container">

                          </span>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="/client-dashboard/facilities"><i class="fa fa-building-o"></i> <span>Facilities</span>
                          <span class="pull-right-container">

                          </span>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-usd"></i> <span>Scholarship</span>
                          <span class="pull-right-container">

                          </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Link in level 2</a></li>
                            <li><a href="#">Link in level 2</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="treeview">
                        <a href="#"><i class="fa fa-building-o"></i> <span>Request Institution</span>
                          <span class="pull-right-container">

                          </span>
                        </a>

                    </li>
                    @endif
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 864px;">
            <section class="content-header">


                <section class="content">

                    <main class="mdl-layout__content mdl-color--grey-100">
                        <div class="mdl-grid">
                            @yield('content')
                        </div>
                    </main>
                    <!-- Your Page Content Here -->

                </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Malaysia's #1 education guide
            </div>
            <!-- Default to the left -->
            <strong>Copyright © 2016 <a href="#">eduhub.my</a>™.</strong>
        </footer>


    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
   Both of these plugins are recommended to enhance the
   user experience. Slimscroll is required when using the
   fixed layout. -->


</body>

</html>
