<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Divergent Team">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
	<title>Divergent Team</title>

</head>
<body class="has-loading-screen ts-theme-dark">
    <div class="ts-page-wrapper">
        <div class="container">

            <!-- Header -->
            <header id="header">
                <nav class="navbar navbar-dark ts-separate-bg-element">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('admin/assets/images/logo@2x.png') }}" height="30px" alt="">
                    </a>
                    <!--end navbar-brand-->
                    <button class="navbar-toggler ts-open-side-panel" type="button" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!--end navbar-toggler-->
                </nav>
                <!--end navbar-->
            </header>

            <!-- Content -->
            <main id="main-content">
                <div class="ts-content-wrapper">
                    <div class="row">
                        <!--Page Title-->
                        <div class="col-md-6">
                            <h1>Bersiap untuk peluncuran</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse viverra lectus neque.
                            </p>
                            <form class="ts-form ts-form-email" data-php-path="assets/php/email.php">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email-subscribe" aria-describedby="subscribe" name="email" placeholder="Enter Email Address" required>
                                        </div>
                                        <!--end form-group-->
                                    </div>
                                    <!--end col-md-10-->
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                                    </div>
                                    <!--end col-md-2-->
                                </div>
                                <!--end row-->
                            </form>
                            <!--end ts-form-->
                        </div>
                        <!--end col-md-6-->
                        <!--Count Down-->
                        <div class="col-md-6">
                            <div class="text-center my-4">
                                <div class="ts-count-down" data-date="January 20, 2022 15:03:26"></div>
                                <!--end ts-count-down-->
                            </div>
                        </div>
                        <!--end col-md-6-->
                    </div>
                    <!--end row-->
                </div>
                <!--end ts-content-wrapper-->
            </main>

            <!-- Footer -->
            <footer id="footer">
                <div class="clearfix py-4">
                    <div class="float-none float-sm-left">
                        <div class="ts-social-icons">
                            <a href="#" class="fab fa-facebook"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-pinterest"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                    <!--end social-icons-->
                    <div class="float-none float-sm-right text-left text-sm-right ts-opacity__50">
                        <small>© 2021 Divergent Team, All Rights Reserved</small>
                    </div>
                    <!--end text-left-->
                </div>
                <!--end clearfix-->
            </footer>
        </div>
        <!--end container-->

        <!--BACKGROUND **********************************************************************************************-->
        <div id="ts-waterpipe-bg" class="ts-background position-fixed ts-separate-bg-element" data-bg-color="#00265f">
            <canvas></canvas>
        </div>
        <!--end ts-background-->
    </div>
    <!--end ts-page-wrapper-->

    <!-- Side Panel -->
    <div class="ts-side-panel" data-bg-color="#001330">
        <a href="#" class="ts-close-side-panel">
            <i class="far fa-times-circle"></i>
        </a>
        <!--end ts-close-side-panel-->
        <div class="container-fluid">
            <section>
                <div class="ts-title">
                    <h2>Tentang Kami</h2>
                </div>
                <!--end ts-title-->
                <p>
                    Uis commodo arcu at egestas vehicula. Maecenas auctor sagittis nulla laoreet vestibulum.
                    Vivamus congue diam blandit quam efficitur, vel mattis lacus feugiat. Integer tempus interdum felis,
                    ut luctus nunc.
                </p>
                <div class="row">
                    <div class="col-sm-6 col-xl-4">
                        <div class="d-flex align-items-center my-3">
                            <div class="ts-circle__md">
                                <figure class="ts-background-image" data-bg-image="{{ asset('admin/assets/images/logo.png') }}"></figure>
                            </div>
                            <div class="ml-3">
                                <h3 class="mb-0">Jane Doe</h3>
                                <h5 class="ts-opacity__50">Company CEO</h5>
                            </div>
                        </div>
                        <!--end d-flex-->
                    </div>
                    <!--end col-md-4-->
                    <div class="col-sm-6 col-xl-4">
                        <div class="d-flex align-items-center my-3">
                            <div class="ts-circle__md">
                                <figure class="ts-background-image" data-bg-image="assets/img/person-02.jpg"></figure>
                            </div>
                            <div class="ml-3">
                                <h3 class="mb-0">Peter Browns</h3>
                                <h5 class="ts-opacity__50">Marketing Guru</h5>
                            </div>
                        </div>
                        <!--end d-flex-->
                    </div>
                    <!--end col-md-4-->
                    <div class="col-sm-6 col-xl-4">
                        <div class="d-flex align-items-center my-3">
                            <div class="ts-circle__md">
                                <figure class="ts-background-image" data-bg-image="assets/img/person-04.jpg"></figure>
                            </div>
                            <div class="ml-3">
                                <h3 class="mb-0">Susane Erwing</h3>
                                <h5 class="ts-opacity__50">Support</h5>
                            </div>
                        </div>
                        <!--end d-flex-->
                    </div>
                    <!--end col-md-4-->
                </div>
                <!--end row-->
            </section>
            <!--end section-->
            <section>
                <div class="ts-title">
                    <h2>Features</h2>
                </div>
                <!--end ts-title-->
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('frontend/assets/img/icon-wallet.png') }}" alt="" class="mw-100 mb-4">
                        <h3>Easy Payments</h3>
                        <p>
                            Aenean ut orci mattis, rhoncus velit interdum, molestie mi
                        </p>
                    </div>
                    <!--end col-md-4-->
                    <div class="col-md-4">
                        <img src="{{ asset('frontend/assets/img/icon-cloud.png') }}" alt="" class="mw-100 mb-4">
                        <h3>Secure Cloud</h3>
                        <p>
                            Uis commodo arcu at egestas vehicula. Maecenas auctor
                        </p>
                    </div>
                    <!--end col-md-4-->
                    <div class="col-md-4">
                        <img src="{{ asset('frontend/assets/img/icon-laptop.png') }}" alt="" class="mw-100 mb-4">
                        <h3>Responsive</h3>
                        <p>
                            Integer tempus interdum felis, ut luctus nunc.
                        </p>
                    </div>
                    <!--end col-md-4-->
                </div>
                <!--end row-->
            </section>
            <!--end section-->
            <section>
                <div class="ts-title">
                    <h2>Our Mission</h2>
                </div>
                <!--end ts-title-->
                <div class="row">
                    <div class="col-md-12 col-xl-4">
                        <p>
                            Nam rhoncus elit ut nibh sagittis varius. Maecenas aliquam ex ut magna cursus pulvinar
                        </p>
                        <ul>
                            <li>Nulla facilisi</li>
                            <li>Donec fringilla dui</li>
                            <li>Dapibus, ut placerat</li>
                        </ul>
                    </div>
                    <!--end col-xl-4-->
                    <div class="col-md-12 col-xl-8">
                        <img src="assets/img/image-01.jpg" alt="" class="mw-100">
                    </div>
                    <!--end col-xl-8-->
                </div>
                <!--end row-->
            </section>
            <!--end section-->
        </div>
        <!--end container-fluid-->
    </div>
    <!--end ts-side-panel-->

    <!--*************************************************************************************************************-->
    <!--************ JS SCRIPTS *************************************************************************************-->
    <!--*************************************************************************************************************-->

	<script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/waterpipe.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery-validate.bootstrap-tooltip.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    <!--Google map-->

    <script>
        var smokyBG = $('#ts-waterpipe-bg').waterpipe({
            gradientStart: '#00c7ee',
            gradientEnd: '#c380ff',
            smokeOpacity: 0.1,
            numCircles: 1,
            maxMaxRad: 'auto',
            minMaxRad: 'auto',
            minRadFactor: 0,
            iterations: 8,
            drawsPerFrame: 10,
            lineWidth: .8,
            speed: 1,
            bgColorInner: "#00265f",
            bgColorOuter: "#00143a"
        });

    </script>

</body>
</html>
