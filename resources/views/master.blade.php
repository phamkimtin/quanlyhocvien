<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=UTF-8>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ URL::asset('/favicon.ico') }}" type="image/x-icon"/>
	@include('layouts/stylesheet')
	<style type="text/css">

	</style>
</head>
@include('layouts/script')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
	<div class="wrapper">
		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
			<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" style="display: none;">
		</div>
		@include('layouts/header')
		@include('layouts/sidebar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper text-sm" style="min-height: 234px;">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					@yield('content-header')
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->
			<!-- Main content -->
			<section class="content">
				@yield('content')
			</section>
			<!-- /.content --> 
		</div>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	
</body>
</html>