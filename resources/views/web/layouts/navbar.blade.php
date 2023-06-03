<!-- Preloader -->
<div id="loading">
	<div id="loading-center">
		<div id="loading-center-absolute">
			<div class="object" id="object_one"></div>
			<div class="object" id="object_two"></div>
			<div class="object" id="object_three"></div>
			<div class="object" id="object_four"></div>
		</div>
	</div>
</div>
<!--End off Preloader -->
<div class="culmn">
	<nav class="navbar navbar-light navbar-expand-lg  navbar-fixed bootsnav @if(URL::current() == route('home')) white no-background @endif">
		<!-- Start Top Search -->
		<div class="top-search">
			<div class="container">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-search"></i></span>
					<input type="text" class="form-control" placeholder="Search">
					<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				</div>
			</div>
		</div>
		<!-- End Top Search -->
		<div class="container">
			<!-- Start Atribute Navigation -->
			<div class="attr-nav">
				<ul>
					<li class=""><a href="{{ url('/login') }}"><i class="fa fa-user"></i></a></li>
					<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
				</ul>
			</div>
			<!-- End Atribute Navigation -->

			<!-- Start Header Navigation -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-menu">
						<span></span>
						<span></span>
						<span></span>
					</button>

				<a class="navbar-brand" href="{{ url('/') }}">

						<img src="{{ asset('web/images/logo.png') }}" class="logo logo-display m-top-10" alt="">
						<img src="{{ asset('web/images/logo.jpg') }}" class="logo logo-scrolled -" alt="">

					</a>
			</div>
			<!-- End Header Navigation -->

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-menu">
				<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
					<li><a href="{{ url('/about') }}">About</a></li>
					<li><a href="{{ url('/contact') }}">Contact</a></li>
					<li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
	</nav>
</div>