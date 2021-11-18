<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Aplikasi untuk mendeteksi gangguan mental dari anak usia dini" />
	<meta name="author" content="Divergent Team" />

	<link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

	<title>@yield('title') - Divergent Team</title>

	<link rel="stylesheet" href="{{ asset('admin/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/font-icons/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/neon-core.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/neon-theme.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/neon-forms.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/custom.css') }}">

	<script src="{{ asset('admin/assets/js/jquery-1.11.3.min.js') }}"></script>
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">

    @yield('content')   

    <!-- Bottom scripts (common) -->
	<script src="{{ asset('admin/assets/js/gsap/TweenMax.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/bootstrap.js') }}"></script>
	<script src="{{ asset('admin/assets/js/joinable.js') }}"></script>
	<script src="{{ asset('admin/assets/js/resizeable.js') }}"></script>
	<script src="{{ asset('admin/assets/js/neon-api.js') }}"></script>
	<script src="{{ asset('admin/assets/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/neon-login.js') }}"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('admin/assets/js/neon-custom.js') }}"></script>


    <!-- Demo Settings -->
    <script src="{{ asset('admin/assets/js/neon-demo.js') }}"></script>

</body>
</html>