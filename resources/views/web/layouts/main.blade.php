<!doctype html>
<html class="no-js" lang="en">
<head>
	<!-- Header -->
	@include('web.layouts.header')
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
	<!-- Navbar -->
	@include('web.layouts.navbar')
	
	<!-- Main content -->
	@yield('content')
	
	<!-- Footer -->
	@include('web.layouts.footer')
	
	<!-- Page js -->
	@yield('pagejs')
</body>
</html>	