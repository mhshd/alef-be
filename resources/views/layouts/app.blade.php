<html>
<head>
    <title>naghd</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{--the next script is essentioal for drop down menu to proceed log out--}}
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body style="background-color: #5a6268; font-family: sans-serif">
    <nav class="navbar navbar-expand-lg navbar-light bg-light .navbar-toggleable" style="direction: rtl">
        <div class="navbar-brand" href="#" class="row">
            <div> نقد ادبی</div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}" style=" color:black; text-decoration-line: none" > ورود </a></li>
                    <p> / </p>
                        <li><a href="{{ route('register') }}" style=" color:black; text-decoration-line: none"  > ثبت نام </a></li>
                    @else

                        <ul class="dropdown">
                            <a href="{{route('userProfile')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-item">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                        خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </ul>
                        <li class="nav-item" style="float: left; padding-right: 90%">
                            <a class="nav-link" href="{{ route('post.create') }}">ساخت پست جدید</a>
                        </li>
                    @endif
                </ul>
            </div>
           </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{'home'}}">خانه </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/movies">فیلم</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/series">سریال</a>
                </li>
                 {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>--}}
                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>--}}
            </ul>
{{--            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get" role="search">--}}
{{--                @csrf--}}
{{--                <input class="form-control mr-sm-2" type="جستجو" placeholder="جستجو" aria-label="Search" name="keyword">--}}
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو--}}
{{--                    <span class="glyphicon glyphicon-search"></span>--}}
{{--                </button>--}}
{{--            </form>--}}

        </div>
    </nav>
@show
<div class="container" >
    <div>
    </div>
    <div class="outer-box">
    <div class="negative-border-right negative-border-left " style="direction: rtl; ">
        @yield('content')
    </div>
    </div>
</div>
<footer>
    <div class="row" style="text-align: right; direction: rtl">
        <div class="col-lg-6 col-sm-12">
        <p>با ما در ارتباط باشید :</p>
        <img class="social-icon" src="{{ asset('pic/facebookicon.png') }}" alt="" />
        <img class="social-icon" src="{{ asset('pic/instaicon.jpg') }}" alt="" />
        <img class="social-icon" src="{{ asset('pic/twittericon.png') }}" alt="" />
        </div>
    </div>
</footer>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
