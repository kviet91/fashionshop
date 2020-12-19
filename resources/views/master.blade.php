<!DOCTYPE html>
<html lang="en">
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>E-SHOP</title>

    <base href="{{asset('')}}">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Arial:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('source/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('source/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('source/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('source/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('source/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('source/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
@include('header')
<div class="content">
    @yield('content')
</div>
@include('footer')
<!-- jQuery Plugins -->
<script src="{{ asset('source/js/jquery.min.js') }}"></script>
<script src="{{ asset('source/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('source/js/slick.min.js') }}"></script>
<script src="{{ asset('source/js/nouislider.min.js') }}"></script>
<script src="{{ asset('source/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('source/js/main.js') }}"></script>

</body>

</html>
