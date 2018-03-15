<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rental Mobil</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/selectize.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/selectize.bootstrap3.css') }}">
    <style type="text/css">
        #copyright{
        bottom: 0;
    width: 100%;
    position: fixed;
    height:50px;
    line-height:50px;
    padding-left: 10px;
    }

    @font-face {
    font-family: yorkwhiteletter;
    src: url('{{ public_path('/public/fonts/yorkwhiteletter.tff') }}');
    }
    </style>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="/images/ico/a.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/a.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/a.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/a.png">
    <link rel="apple-touch-icon-precomposed" href="/images/ico/a.png">
</head><!--/head-->

<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}"><img src="/images/ico/a.png" width="60px" height="40px"><font color="white"> {{ config('app.name') }}</font></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                <div>
                    
                </div>
            </div>
        </div>
    </header><!--/header-->
    
    @yield('content')

    <footer id="copyright" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a href="smkassalaambandung.sch.id"><font color="white">SMK Assalaam Bandung</font></a>
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        
                            <a href="#"><font color="white"> Home </font></a>|
                            <a href="#"><font color="white">About Us </font></a>|
                            <a href="#"><font color="white">Faq </font></a>|
                            <a href="#"><font color="white">Contact Us </font></a>
                            <font color="white"><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></font>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/app.js"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/selectize.min.js') }}"></script>
    <script src="/js/custom.js"></script>
    @yield('scripts')
</body>
</html>