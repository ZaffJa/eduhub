<!DOCTYPE html>

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
    <!-- Datatables css -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/client/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/client/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">

    <!-- Live reload plugin for local pc (will be removed when production starts) -->
    <script src="http://localhost:8000/livereload.js" charset="utf-8"></script>
    <!-- <link rel="stylesheet" href="/css/material.min.css"> -->

    <!-- jQuery 2.2.3 -->
    <script src="/client/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/client/bootstrap/js/bootstrap.min.js"></script>
    <!-- Jquery User Interface plugin -->
    <script src="/js/jquery-ui.js"></script>
    <!-- Slim scroll plugin-->
    <script type="text/javascript" src="/client/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- Plugin for confirmation to leave before saving -->
    <script src="/js/jquery.are-you-sure.js"></script>

    <script src="/client/dist/js/app.min.js"></script>


    @yield('header-css')
</head>
<style media="screen">
  select{
        width: 100%;
  }
</style>
<body class=" skin-red sidebar-toggle">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <a href="/client-dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
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
                                <i class="fa fa-cog"></i><span class=""><b>Hello,</b> {{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="http://www.iiwas.org/conferences/iiwas2011/img/logos/UTM.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->client != null ? Auth::user()->client->institution->name : 'Not Associated with Instititution'}}
                                        <small>Member since {{Auth::user()->client != null ? Auth::user()->client->user->created_at->diffForHumans() : ''}}</small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        @if(Auth::user()->client != null)
                                        <a href="{!! route('client.institution.edit',Auth::user()->client->institution->id) !!}" class="btn btn-default btn-flat">
                                            <font color="black"><i class="fa fa-user"></i> Profile</font>
                                        </a>
                                        @endif
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            <font color="black"><i class="fa fa-sign-out"></i> Sign out</font>
                                        </a>
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
                        <img src="/img/logo/LOGO-U.svg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">


                        <p style="-webkit-transform">{{ Auth::user() != null ? Auth::user()->name : ''}}</p>
                    </div>
                </div>

                <!-- search form (Optional) -->

                <!-- /.search form -->

                <!-- Sidebar Menu -->

                <ul class="sidebar-menu">

                    <!-- Dashboard -->
                    @if(Auth::user()->client != null ? Auth::user()->client->institution != null : '')
                    <li class="header">Dashboard</li>

                    <li class="treeview">
                        <a href="/client-dashboard/institution"><i class="fa fa-university"></i> <span>Institution</span>
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
                        <a href="/client-dashboard/course"><i class="fa fa-book"></i> <span>Courses</span>
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
                        <a href="/client-dashboard/scholarship/view"><i class="fa fa-usd"></i> <span>Scholarship</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>

                    <!-- Short Course -->
                    <li class="header">Other</li>

                    <li class="treeview">
                        <a href="/client-dashboard/course" class="not-active"><i class="fa fa-certificate"></i> <span>Short Courses(Coming Soon)</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="header">Settings</li>

                    <li class="treeview">
                        <a href="{!! route('client.institution.edit',Auth::user()->client->institution->id) !!}"><i class="fa fa-cog"></i> <span>Edit Profile</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span>Logout</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                    @else
                    <li class="treeview">
                        <a href="{!!route('client.request.institution')!!}"><i class="fa fa-building-o"></i> <span>Request Institution</span>
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

        <script type="text/javascript">
            $(function() {
                $('.confirmLeaveBeforeSave').areYouSure({
                    message: 'It looks like you have been editing something. ' +
                        'If you leave before saving, your changes will be lost.'
                });
            });
        </script>


        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
   Both of these plugins are recommended to enhance the
   user experience. Slimscroll is required when using the
   fixed layout. -->

</body>

</html>
