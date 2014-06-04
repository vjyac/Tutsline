<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Tutsline Panel" />
	<meta name="author" content="tutsline.com" />

  {{ App::setLocale('es') }}



	<title>{{trans('pages.name')}}</title>



<link rel="stylesheet" href="/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
<link rel="stylesheet" href="/assets/css/neon.css"  id="style-resource-5">
<link rel="stylesheet" href="/assets/css/custom.css"  id="style-resource-6">

<script src="/assets/js/jquery-1.10.2.min.js"></script>



	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<!-- TS1387507088: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body">

<div class="page-container horizontal-menu">

	<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->

	<div class="navbar-inner">

		<!-- logo -->
		<div class="navbar-brand">
			<a href="/">
				<img src="/images/logo-horizontal.png" alt="" />
			</a>
		</div>



		<!-- main menu -->
		<ul class="navbar-nav">
			@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
				<li>
					<a href="#"><i class="entypo-book"></i><span>{{ Lang::get('messages.menu_admin') }}</span></a>
						<ul>
							<li>
								<a href="#"><span>{{ Lang::get('messages.menu_configuracion') }}</span></a>
									<ul>


												<li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('/users') }}">{{trans('pages.users')}}</a></li>
												<li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::to('/groups') }}">{{trans('pages.groups')}}</a></li>

												<li>
														<a href="/ciudads"><span>{{ Lang::get('messages.menu_ciudad') }}</span></a>
												</li>
												<li>
														<a href="/estados"><span>{{ Lang::get('messages.menu_estados') }}</span></a>
												</li>

												<li>
														<a href="/paiss"><span>{{ Lang::get('messages.menu_pais') }}</span></a>
												</li>

												<li>
														<a href="/areasinteress"><span>{{ Lang::get('messages.menu_areasinteres') }}</span></a>
												</li>

												<li>
														<a href="/cursos"><span>{{ Lang::get('messages.menu_cursos') }}</span></a>
												</li>

									</ul>
							</li>
						</ul>
				</li>
			@endif
			<!-- Search Bar -->
			<li id="search" class="search-input-collapsed"><!-- add class "search-input-collapsed" to auto collapse search input -->
				<form method="get" action="#">
					<input type="text" name="q" class="search-input" placeholder="Search something..." />
					<button type="submit"><i class="entypo-search"></i></button>
				</form>
			</li>
</ul>


		<!-- notifications and other links -->
		<ul class="nav navbar-right pull-right">

			<!-- dropdowns -->
			<li class="dropdown">

				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="entypo-list"></i>
					<span class="badge badge-info">6</span>
				</a>

				<!-- dropdown menu (tasks) -->
				<ul class="dropdown-menu">
					<li class="top">
	<p>You have 6 pending tasks</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Procurement</span>
					<span class="percent">27%</span>
				</span>

				<span class="progress">
					<span style="width: 27%;" class="progress-bar progress-bar-success">
						<span class="sr-only">27% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">App Development</span>
					<span class="percent">83%</span>
				</span>

				<span class="progress progress-striped">
					<span style="width: 83%;" class="progress-bar progress-bar-danger">
						<span class="sr-only">83% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">HTML Slicing</span>
					<span class="percent">91%</span>
				</span>

				<span class="progress">
					<span style="width: 91%;" class="progress-bar progress-bar-success">
						<span class="sr-only">91% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Database Repair</span>
					<span class="percent">12%</span>
				</span>

				<span class="progress progress-striped">
					<span style="width: 12%;" class="progress-bar progress-bar-warning">
						<span class="sr-only">12% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Backup Create Progress</span>
					<span class="percent">54%</span>
				</span>

				<span class="progress progress-striped">
					<span style="width: 54%;" class="progress-bar progress-bar-info">
						<span class="sr-only">54% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Upgrade Progress</span>
					<span class="percent">17%</span>
				</span>

				<span class="progress progress-striped">
					<span style="width: 17%;" class="progress-bar progress-bar-important">
						<span class="sr-only">17% Complete</span>
					</span>
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">See all tasks</a>
</li>				</ul>


			<!-- raw links -->
			<!-- <li>
				<a href="#">Live Site</a>
			</li> -->

			<li class="sep"></li>


				@if (Sentry::check())
				<li {{ (Request::is('users/show/' . Session::get('userId')) ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}/{{ Session::get('userId') }}">{{ Session::get('email') }}</a></li>
				<li><a href="{{ URL::to('logout') }}">{{trans('pages.logout')}}</a></li>
				@else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::to('login') }}">{{trans('pages.login')}}</a></li>
				@endif




      @if (Auth::user())
				<li>
					<a href="/perfil">
						<i class="entypo-user right"></i> {{ Auth::user()->username }}
					</a>
				</li>
      @endif

			<!-- mobile only -->
			<li class="visible-xs">

				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="horizontal-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</li>

		</ul>

	</div>

</header>
	<div class="main-content">

    <div class="container">
		    <div class="row">
				      <div class="col-md-12">
                @yield('content')

		          </div>
	      </div>
    </div>
</div>

<!-- Footer -->
<footer class="main">

		<div class="pull-right">
		<a href="http://www.codexcontrol.com/" target="_blank"><strong>CodexControl.com</strong></a>
	</div>

	&copy; 2014 <strong>Learning in </strong>  <a href="http://tutsline.co/" target="_blank">TutsLine.com</a>

</footer>
						</div>
			</div>
		</div>
			</div>



</body>


	<link rel="stylesheet" href="/assets/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="/assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="/assets/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="/assets/js/ckeditor/ckeditor.js" id="script-resource-9"></script>
	<script src="/assets/js/ckeditor/adapters/jquery.js" id="script-resource-10"></script>
	<script src="/assets/js/neon-chat.js" id="script-resource-11"></script>
	<script src="/assets/js/neon-custom.js" id="script-resource-12"></script>
	<script src="/assets/js/neon-demo.js" id="script-resource-13"></script>


	<link rel="stylesheet" href="/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="/js/select2/select2.css"  id="style-resource-2">
	<link rel="stylesheet" href="/js/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">
	<link rel="stylesheet" href="/js/daterangepicker/daterangepicker-bs3.css"  id="style-resource-4">

	<script src="/js/typeahead.min.js" id="script-resource-9"></script>
	<script src="/js/selectboxit/jquery.selectBoxIt.min.js" id="script-resource-10"></script>
	<script src="/js/bootstrap-datepicker.js" id="script-resource-11"></script>
	<script src="/js/bootstrap-timepicker.min.js" id="script-resource-12"></script>
	<script src="/js/bootstrap-colorpicker.min.js" id="script-resource-13"></script>
	<script src="/js/daterangepicker/moment.min.js" id="script-resource-14"></script>
	<script src="/js/daterangepicker/daterangepicker.js" id="script-resource-15"></script>
	<script src="/js/jquery.multi-select.js" id="script-resource-16"></script>
	<script src="/js/neon-chat.js" id="script-resource-17"></script>
	<script src="/js/neon-custom.js" id="script-resource-18"></script>
	<script src="/js/neon-demo.js" id="script-resource-19"></script>



</html>
