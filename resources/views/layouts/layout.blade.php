<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Larashop</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/css/responsive.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('/css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('/css/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img src="images/home/logo.png" alt="" /></a>
                    </div>

                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">

                            <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}"><i class="fa fa-lock"></i>Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-out"></i>Admin Dashboard</a></li>
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li><a href="{{url('products')}}">Shop</a></li>
                            <li><a href="{{url('contact-us')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
@yield('content')

<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/price-range.js')}}"></script>
<script src="{{asset('/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('/js/jquery.scrollUp.min.js')}}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('/js/metisMenu.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('/js/raphael.min.js')}}"></script>
<script src="{{asset('/js/morris.min.js')}}"></script>
<script src="{{asset('/js/morris-data.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('/js/sb-admin-2.js')}}"></script>
</body>
</html>