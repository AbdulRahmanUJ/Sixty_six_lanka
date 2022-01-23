<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'sixty six lanka')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/style.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- pdf --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"
            integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

	{{-- jAutoCalc --}}
	{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}
	{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script> --}}


    <!-- Styles -->
    <link href="{{ asset('/css/style_css.css') }}" rel="stylesheet">

    {{-- preloader --}}
    {{-- <link href="{{ asset('layouts.preload') }}" rel="stylesheet"> --}}

    {{-- title image --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" sizes="96*96">
</head>
<style>
	a{
		text-decoration: none !important;
	}
	li{
		list-style: none !important;
	}
    .sidebar .sidebar-content{
        padding-top: 70px;
    }
	.sidebar-link.active{
		background: linear-gradient(90deg, #4c527a73, #1D255700);
		border-left: solid 3px #0099FF;
		color: #ffffff;
	}
	.navbar{
		z-index: 999;
		position: relative;
	}
	.navbar.sticky{
		top: 0px;
		position: fixed;
		left: 0px;
		right: 0px;
	}
	a:focus,
	button:focus {
		outline: none;
	}
	.no-focus a,
	.no-focus button {
		outline: none;
	}
    /* Switch Start */
    /* The switch - the box around the slider */
    .toggle.switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 20px;
      }

      /* Hide default HTML checkbox */
      .toggle.switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }

      /* The slider */
      .toggle.switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgb(216, 34, 34);
        -webkit-transition: .4s;
        transition: .4s;
      }

      .toggle.switch .slider:before {
        position: absolute;
        content: "";
        height: 13px;
        width: 13px;
        left: 6px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .toggle.switch input:checked + .slider {
        background-color: #11c964;
      }

      .toggle.switch input:focus + .slider {
        box-shadow: 0 0 1px #11c964;
      }

      .toggle.switch input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      /* Rounded sliders */
      .toggle.switch .slider.round {
        border-radius: 34px;
      }

      .toggle.switch .slider.round:before {
        border-radius: 50%;
      }
      .alert{
          padding: 5px 10px;
      }
/* Switch End */
</style>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						<h4 style="color: #ffffff">Super Admin</h4>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link {{request()->is('superadmin')?'active':''}}" href="/superadmin">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a href="#admin" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Admin</span>
						</a>
                        <ul id="admin" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link  {{request()->is('superadmin/admin/list')?'active':''}}" href="/superadmin/admin/list">Admin List</a></li>
						</ul>
						<ul id="admin" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link  {{request()->is('superadmin/admin/create')?'active':''}}" href="/superadmin/admin/create">Create Admin</a></li>
						</ul>
					</li>
                    <a href="#package" data-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="package"></i> <span class="align-middle">Package</span>
                    </a>
                    <ul id="package" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{request()->is('superadmin/package')?'active':''}}" href="/superadmin/package">
                                <i class="align-middle"></i> <span class="align-middle">Lists of Packages</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="package" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{request()->is('superadmin/package/create')?'active':''}}" href="/superadmin/package/create">
                                <i class="align-middle"></i> <span class="align-middle">Create Packages</span>
                            </a>
                        </li>
                    </ul>
                    <li class="sidebar-item">
						<a class="sidebar-link {{request()->is('superadmin/preorder')?'active':''}}" href="/superadmin/preorder">
							<i class="align-middle" data-feather="paperclip"></i> <span class="align-middle">Pre Orders</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{request()->is('superadmin/sender')?'active':''}}" href="/superadmin/sender">
							<i class="align-middle" data-feather="send"></i> <span class="align-middle">Senders</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link {{request()->is('superadmin/receiver')?'active':''}}" href="/superadmin/receiver">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Receivers</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link {{request()->is('superadmin/cost')?'active':''}}" href="/superadmin/cost">
							<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Cost</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link {{request()->is('superadmin/country')?'active':''}}" href="/superadmin/country">
							<i class="align-middle" data-feather="globe"></i> <span class="align-middle">Country | State | City</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar sticky navbar-expand navbar-light navbar-bg" id="navbar_top">
                <img src="{{ asset('image/logo.png') }}" alt="tag" width="120px" height="35px">
                <a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						{{-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li> --}}
						{{-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row no-gutters align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li> --}}
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                @if (auth()->user()->image)
                                    <img src="{{ asset('users/profile/'.Auth::user()->image) }}" style="border-radius: 50% !important" class="avatar img-fluid rounded mr-1" alt="profile Image">
                                @endif
                                {{-- <img src="{{ asset('image/profile.png') }}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" />  --}}
                                <span class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/home"><i class="align-middle mr-1" data-feather="home"></i> Home</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/superadmin/setting"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								{{-- <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a> --}}
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i class="align-middle mr-1" data-feather="log-out"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<main class="content">
				<div class="container-fluid py-5">
					<div class="container">
						@include('layouts.superadmin.message')
					</div>
					<h1 class="h3 mb-3">
						@yield('dashboard_title', 'sixty six lanka')
					</h1>
					@yield('content')
				</div>
			</main>

			<footer class="footer">
				@include('layouts.superadmin.footer')
			</footer>
		</div>
	</div>
	<script src="/js/app_style.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
