
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Admin</title>
	<link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}" />
	<link rel="stylesheet" href="{{asset('admin/css/style.css')}}" />
	<link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

</head>

<body>
	<div class="container-scroller">
		@include('include.sidebar')
		<div class="container-fluid page-body-wrapper">
			<nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
		@include('include.header')
				
			</nav>
			<div class="main-panel">
				<div class="content-wrapper">
					
					@yield('content')
				</div>
				@include('include.footer')
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
	<script src="{{asset('admin/js/off-canvas.js')}}"></script>
	<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
	<script src="{{asset('admin/js/misc.js')}}"></script>
</body>

</html>