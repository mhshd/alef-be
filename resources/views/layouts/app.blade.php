<html>
<head>
    <title>کلبه ادبیات</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{--the next script is essentioal for drop down menu to proceed log out--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light .navbar-toggleable navbar-brand"
     style="direction: rtl; width: 100%">
    <div style="float: left; width: 100%"> کلبه ادبیات
    </div>
    <div>
        <ul class="nav navbar-nav navbar-left" style="float: left">
            @if (Auth::guest())
                <li><a href="{{ route('login') }}" style=" color:black; text-decoration-line: none"> ورود </a></li>
                <li><a href="{{ route('register') }}" style=" color:black; text-decoration-line: none"> ثبت نام</a></li>
            @else
                <li class="nav-item" >
                    <a class="nav-link" href="{{ route('post.create') }}">ساخت پست جدید</a>
                </li>
                <ul>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        role="button" aria-expanded="false">
                        خروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>

            @endif
        </ul>
    </div>
    <div>
        <ul class="nav navbar-nav navbar-right" style="float: right">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{'home'}}">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{'critic'}}">نقد کتاب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{'introduce'}}"> معرفی کتاب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{'drafts'}}">دستنوشته های کیومرث حشمتی</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get" role="search">
                    @csrf
                    <input class="form-control mr-sm-2" type="جستجو" placeholder="جستجو" aria-label="Search"
                           name="keyword">
                    <button class="btn btn-outline-primary my-2 my-sm-0 "
                            style="background-color: #827FB2; border-color: #827FB2; color: #0C083B"
                            type="submit">جستجو
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>

            </div>
            <!-- Authentication Links -->

        </ul>
    </div>

    <button class="navbar-toggler butt" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: #0C083B">
        <span class="navbar-toggler-icon"></span>
    </button>


</nav>
@yield('content')
</div>
</div>
</div>
<footer>
    <div class="row" style="text-align: right; direction: rtl">
        <div class="col-lg-6 col-sm-12">
            <p>با ما در ارتباط باشید :</p>
            <img class="social-icon" src="{{ asset('pic/facebookicon.png') }}" alt=""/>
            <img class="social-icon" src="{{ asset('pic/instaicon.jpg') }}" alt=""/>
            <img class="social-icon" src="{{ asset('pic/twittericon.png') }}" alt=""/>
        </div>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
