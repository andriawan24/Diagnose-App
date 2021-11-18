<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')

	<title>@yield('title') - Divergent Team</title>

    @stack('before-styles')
	@include('includes.styles')
    @stack('after-styles')

	<script src="{{ asset('admin/assets/js/jquery-1.11.3.min.js') }}"></script>
</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	@include('includes.sidebar')

	<div class="main-content">
		
        @include('includes.navbar')
		
		<hr />
		
		@yield('content')
		
		<!-- Footer -->
		<footer class="main">
			
			&copy; 2021 <strong>Divergent Team</strong> All Right Reserved
		
		</footer>
	</div>
</div>
    @stack('before-scripts')
	@include('includes.scripts')
    @stack('after-scripts')

	@if (Session::has('success'))
		<script>
			toastr.options.closeButton = true;
			toastr.success("{{ Session::get('success') }}")
		</script>
	@endif

	@if (Session::has('warning'))
		<script>
			toastr.options.closeButton = true;
			toastr.warning("{{ Session::get('warning') }}")
		</script>
	@endif

	@if (Session::has('error'))
		<script>
			toastr.options.closeButton = true;
			toastr.error("{{ Session::get('error') }}")
		</script>
	@endif
</body>
</html>