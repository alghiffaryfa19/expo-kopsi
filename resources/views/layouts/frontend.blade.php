<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') - EXPO KOPSI 2020</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
    <script src="{{asset('superadmin/js/jquery.min.js')}}"></script>
    <link href="{{asset('assets/css/star.css')}}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/star.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: white}}&quot;);">
        <div class="container"><a class="navbar-brand" href="#"><img src="{{asset('assets/img/logo.png')}}"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">

                    @if (Route::has('login'))
                            @if (Auth::check())
                            <li class="nav-item" role="presentation"><a href="{{ url('/home') }}" class="btn btn-primary" type="button">Dasbor</a></li>
                            <li class="nav-item" role="presentation"><a class="btn btn-danger" type="button" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                                </li>
                            @else
                            <li class="nav-item" role="presentation"><a href="{{ url('/login') }}" class="btn btn-primary" type="button">Masuk</a></li>
                            @endif
                    @endif
                </ul>
        </div>
        </div>
    </nav>
    @yield('content')
    <div class="footer-basic" style="background-color: white}}&quot;);">
        <footer>
            <div class="social">
                <h5>Powered by</h5><img src="{{asset('assets/img/logo.png')}}"></div>
            <p class="text-dark copyright">Pusat Prestasi Nasional © 2020</p>
        </footer>
    </div>
    
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>