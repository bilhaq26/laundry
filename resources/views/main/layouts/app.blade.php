<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Nirwana Software - HTML5 Bootstrap Template">
    <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/favicons/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicons/apple-icon-76x76.pn') }}g">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/favicons/ms-icon-144x144.png') }}">
    <!-- PWA primary color-->
    <meta name="theme-color" content="#2196f3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"><!-- Facebook-->
    <meta property="author" content="nirwana">
    <meta property="og:site_name" content="alexstrap.ux-maestro.com">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website"><!-- Twitter-->
    <meta property="twitter:site" content="nirwana.ux-maestro.com">
    <meta property="twitter:domain" content="nirwana.ux-maestro.com">
    <meta property="twitter:creator" content="nirwana">
    <meta property="twitter:card" content="summary">
    <meta property="twitter:image:src" content="{{ asset('assets/images/logo-saas2.png') }}">
    <meta property="og:url" content="nirwana.indisains.com/saas2">
    <meta property="og:title" content="Software">
    <meta property="og:description" content="Nirwana Software - HTML5 Bootstrap Template">
    <meta name="twitter:site" content="nirwana.indisains.com/saas2">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ ('assets/images/logo-saas2.png') }}">
    <meta property="og:image" content="{{ ('assets/images/logo-saas2.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <title>Detail Pelanggan</title><!-- Styles-->
    <!-- Put the 3rd/plugins css here-->
    <link href="{{ asset('assets/css/vendors/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/hamburger-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/animate-extends.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/slick-carousel/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/vendors/slick-carousel/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div id="preloader" style="position: fixed; z-index: 10000; background: #fafafa; width: 100%; height: 100%"><img
            style="opacity: 0.2; position: fixed; top: calc(50% - 50px); left: calc(50% - 50px)"
            src="{{ asset('assets/images/loading.gif') }}" alt="loading">
    </div>
    <div class="m-application theme--light transition-page" id="app">
        <div class="loading"></div>
        {{ $slot }}
    </div><!-- Scripts-->
    <!-- Put the 3rd/plugins javascript here-->
    <script src="{{ asset('assets/js/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/enquire.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.navScroll.min.js') }}"></script>
    <!-- This assets are not avalaible in npm.js or it has been costumized-->
    <script src="{{ asset('assets/js/vendors/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/materialize.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
</body>

</html>
