<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>01 - Trang chủ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-signin-client_id" content="12345678-gbgin9h7q69rpjehq1cd2441b4nosnid.apps.googleusercontent.com">
        @yield('css')

        <link rel="stylesheet" href="{{ asset('frontend/style/main.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendor/fullpage/fullpage.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome-4.7.0/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendor/wowjs/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendor/fancybox-master/dist/jquery.fancybox.css') }}">
    </head>
    <body>
        @yield('content')
        @include('includes.frontend.header')
        
        <script src="{{ asset('frontend/vendor/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('frontend/vendor/fullpage/fullpage.js') }}"></script>
        <script src="{{ asset('frontend/vendor/fancybox-master/dist/jquery.fancybox.js') }}"></script>
        <script src="{{ asset('frontend/vendor/slick/slick.js') }}"></script>
        <script src="{{ asset('frontend/vendor/wowjs/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/javascript/app.js') }}"></script>
        
        <script>
            if($(window).width() > 1200){
                $('.main-wrapper .section-contact').bind('mousewheel', (event)=> {
                    $('.section-footer').addClass('active');
                    $('.main-wrapper .section-contact .container-master').addClass('active');
                })
            }
        </script>
        @include('includes.frontend.footer')
    </body>
</html>