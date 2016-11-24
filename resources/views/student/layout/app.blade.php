<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/material-dashboard/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2016 07:40:02 GMT -->

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="/assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Student Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<meta name="csrf-token" content="{{ csrf_token() }}">


	<!-- Canonical SEO -->
	<link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard" />

	<!-- Bootstrap core CSS     -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

	<!--  Material Dashboard CSS    -->
	<link href="/assets/css/material-dashboard.css" rel="stylesheet" />

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="/assets/css/demo.css" rel="stylesheet" />

	<!--     Fonts and icons     -->
	<link href="../../../assets/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

	<!--   Core JS Files   -->
	<script src="/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery-ui.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>


	<!--  Notifications Plugin    -->
	<script src="/assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="/assets/js/material-dashboard.js"></script>

	<!--   Sharrre Library    -->
	<script src="/assets/js/jquery.sharrre.js"></script>

	<script src="/assets/js/demo.js"></script>
	 @yield('header-css')
</head>

<body>

	<div class="wrapper">

		<div class="sidebar" data-color="red" data-image="/assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="https://eduhub.my/home/full-courses" class="simple-text">
					 Eduhub.my
				</a>
			</div>

			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="{{ Request::is('student') ? 'active' : '' }}">
						<a href="{{action('Student\DashboardController@view')}}">
							<i class="material-icons">dashboard</i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="{{ Request::is('student/profile') ? 'active' : '' }}">
						<a href="{{action('Student\ProfileController@index')}}">
							<i class="material-icons">person</i>
							<p>User Profile</p>
						</a>
					</li>
					<li class="{{ Request::is('student/spm') ? 'active' : '' }}">
						<a href="{{action('Student\SpmController@index')}}">
							<i class="material-icons">book</i>
							<p>SPM</p>
						</a>
					</li>
					<li class="{{ Request::is('student/personality') ? 'active' : '' }}">
						<a href="{{action('Student\PersonalityController@view')}}">
							<i class="material-icons">content_paste</i>
							<p>Personality Test</p>
						</a>
					</li>
					<li class="{{ Request::is('student/find-institution') ? 'active' : '' }}">
						<a href="{{action('Student\InstitutionController@index')}}">
							<i class="material-icons">search</i>
							<p>Find Institution</p>
						</a>
					</li>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="material-icons">locks</i>
                            <p>Sign out</p>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
				</ul>
			</div>
		</div>

		<div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
									Dashboard
								</a>
							</li>
							<li>
								<a href="#">
									Institutions
								</a>
							</li>
							<li>
								<a href="#">
									Personality Test
								</a>
							</li>
							<li>
								<a href="#">
								   Contact Us
								</a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script> <a href="http://www.eduhub.my">eduhub.my</a>, made with love for a better future
					</p>
				</div>
			</footer>

			<div class="fixed-plugin">
				<div class="dropdown hide-dropdown">
					<a href="#" data-toggle="dropdown">
						<i class="fa fa-cog fa-2x"> </i>
					</a>
					<ul class="dropdown-menu">
						<li class="header-title"> Sidebar Filters</li>
						<li class="adjustments-line">
							<a href="javascript:void(0)" class="switch-trigger">
								<div class="text-center">
									<span class="badge filter badge-purple active" data-color="purple"></span>
									<span class="badge filter badge-blue" data-color="blue"></span>
									<span class="badge filter badge-green" data-color="green"></span>
									<span class="badge filter badge-orange" data-color="orange"></span>
									<span class="badge filter badge-red" data-color="red"></span>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li class="header-title">Images</li>
						<li class="active">
							<a class="img-holder switch-trigger" href="javascript:void(0)">
								<img src="/assets/img/sidebar-1.jpg">
							</a>
						</li>
						<li>
							<a class="img-holder switch-trigger" href="javascript:void(0)">
								<img src="/assets/img/sidebar-2.jpg">
							</a>
						</li>
						<li>
							<a class="img-holder switch-trigger" href="javascript:void(0)">
								<img src="/assets/img/sidebar-3.jpg">
							</a>
						</li>
						<li>
							<a class="img-holder switch-trigger" href="javascript:void(0)">
								<img src="/assets/img/sidebar-4.jpg">
							</a>
						</li>




					</ul>
				</div>
			</div>


		</div>
	</div>


	<script>
		$('.btn_edit').on('click', function() {
			$('.index-view').hide();
			$('.edit-view').show();
		});

		$('.btn_view').on('click', function() {
			$('.edit-view').hide();
			$('.index-view').show();

		});
	</script>


</body>
<!-- Mirrored from demos.creative-tim.com/material-dashboard/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2016 07:41:19 GMT -->

</html>
