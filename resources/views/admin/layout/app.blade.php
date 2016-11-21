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
    select {
        width: 100%;
    }
</style>

<body class=" skin-red sidebar-toggle">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <a href="/admin/all-institution" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>Dashboard</span>
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
                        <li class="dropdown notifications-menu" id="notifications_dropdown">
                            <a href="_#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning" id="label_notification_counts">{{$admin_notifications->count() > 0 ? $admin_notifications->count() : ''}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><span id="notification_message"></span></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id="notifications_menu">
                                        @foreach($admin_notifications as $notification)
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i>{{ $notification->message}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="footer"><a href="{{action('NotificationController@getAdminNotifications')}}">View all</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                                <i class="fa fa-cog"></i><span class=""><b>Hello,</b> {{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <!-- <img src="http://www.iiwas.org/conferences/iiwas2011/img/logos/UTM.jpg" class="img-circle" alt="User Image"> -->
                                    <p>
                                        <small>Member since {{Auth::user() != null? Auth::user()->created_at->diffForHumans() : ''}}</small>
                                    </p>
                                </li>

                                <li class="user-footer">
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
                    <li class="header">Dashboard</li>
                    @if(Auth::user()->hasRole('admin'))
                    <li class="treeview">
                        <a href="{{action('InstitutionController@viewAllInstitution')}}"><i class="fa fa-university"></i> <span>All Institution</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{action('InstitutionController@viewInstitutionRequest')}}"><i class="fa fa-university"></i> <span>View Request</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{action('InstitutionController@requestHistory')}}"><i class="fa fa-university"></i> <span>Approval History</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{action('InstitutionController@index')}}"><i class="fa fa-university"></i> <span>Create Institution</span>
                          <span class="pull-right-container">
                          </span>
                        </a>
                    </li>
                    @endif
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
                            <div class='row'>
                                @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session('status') != null)
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Success!</h4> {{ session('status') }}
                                </div>
                                @endif
                            </div>
                            @yield('content')
                        </div>
                    </main>
                    <!-- Your Page Content Here -->
                </section>
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
    </div>
    <!-- ./wrapper -->
</body>
<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript">
$(function(){
    $('#notifications_dropdown').on('click',function(){

        $('#label_notification_counts').text('');

        $.ajax({
            type: "POST",
            url: "{{action('NotificationController@reset')}}",
            data: {},
            success: function(data, textStatus, jqXHR){
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown){

            }
        });
    });
});

</script>

</html>
