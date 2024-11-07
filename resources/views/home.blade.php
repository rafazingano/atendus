<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Atendus">
    <meta name="description" content="Atendus">
    <meta property="og:site_name" content="Atendus">
    <meta property="og:url" content="https://atendus.com.br/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Atendus">
    <meta name='og:image' content='{{ asset('images/assets/ogg.png') }}'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1E78FF">
    <meta name="msapplication-navbutton-color" content="#1E78FF">
    <meta name="apple-mobile-web-app-status-bar-style" content="#1E78FF">
    <title>Atendus</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" media="all">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="{{ asset('vendor/html5shiv.js') }}"></script>
		<script src="{{ asset('vendor/respond.js') }}"></script>
	<![endif]-->
</head>
<body>
    <div class="main-page-wrapper">
        @include('partials.preloader')
        @include('partials.header')
        @include('partials.banner')
        @include('partials.fancy-feature-eight')
        @include('partials.fancy-feature-nine')
        @include('partials.fancy-feature-ten')
        @include('partials.fancy-feature-eleven')
        @include('partials.counter-section-one')
        @include('partials.fancy-feature-twelve')
        @include('partials.feedback-section-four')
        @include('partials.fancy-short-banner-two')
        @include('partials.blog-section-two')
        @include('partials.address-section-one')
        @include('partials.footer')
        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>
        <script src="{{ asset('vendor/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/aos-next/dist/aos.js') }}"></script>
        <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
    </div>
</body>

</html>
