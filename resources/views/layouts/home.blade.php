<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Wedding') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Undangan, Wedding, Invitation" />
    <meta name="keywords" content="wedding, laravel, web, portfolio" />
    <meta name="author" content="Firlana Luchiana Dewi" />

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
        type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('tehome/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('tehome/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('tehome/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('tehome/css/magnific-popup.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('tehome/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tehome/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('tehome/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('tehome/js/modernizr-2.6.2.min.js') }}"></script>

</head>

<body>

    <div class="fh5co-loader"></div>

    @yield('content')

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('tehome/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('tehome/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('tehome/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('tehome/js/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('tehome/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('tehome/js/jquery.countTo.js') }}"></script>

    <!-- Stellar -->
    <script src="{{ asset('tehome/js/jquery.stellar.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('tehome/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('tehome/js/magnific-popup-options.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script>
    <script src="{{ asset('tehome/js/simplyCountdown.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('tehome/js/main.js') }}"></script>

    <script>
        var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

        // default example
        simplyCountdown('.simply-countdown-one', {
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate()
        });

        //jQuery example
        $('#simply-countdown-losange').simplyCountdown({
            year: d.getFullYear(),
            month: d.getMonth() + 1,
            day: d.getDate(),
            enableUtc: false
        });
    </script>

</body>

</html>
