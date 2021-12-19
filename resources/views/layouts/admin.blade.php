<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.meta')

	<title>@yield('title') - Divergent Team</title>

    @stack('before-styles')
	@include('includes.styles')
    @stack('after-styles')

	<script src="{{ asset('admin/assets/js/jquery-1.11.3.min.js') }}"></script>
	
	<!-- Hotjar Tracking Code for My site -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2725314,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
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