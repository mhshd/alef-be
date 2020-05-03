<html>
<head>
    <meta charset="UTF-8">
    <meta name="title" content="الف ب : کلبه ای دنج برای ادب دوستان">
    <meta name="description" content="الف ب در تلاش است لذت خواندن ادبیات را برای کاربران ایران یهموار کند. ایجاد مجمعی از ادب دوستان ایرانی از اهداف این سایت است. نقد داستان و شعر، معرفی کتاب و دستنوشته های شاعران و نوینسندگان جوان در این سایت جا دارد.">
    <meta name="keywords" content="مقاله و ترجمه و پایگاه ادبی و سایت ادبی و نقد هنری و کتاب, معرفی,ادبیات, نقد, داستان, شعر, حافظ, سعدی, مولوی, نظامی, عطار, خیام, گنجور">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:locale" content="fa_IR">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.alef-be.ir" />
    <meta property="og:site_name" content="سایت الف-ب|سایت ادبی هنری الف-ب" />
    <title>الف ب</title>
    <link href="{{ asset('/../css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{--the next script is essentioal for drop down menu to proceed log out--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <style type="text/css">
        @font-face {
            font-family:'BYekan';/*تعریف یک نام برای فونت*/
            src:url('/../font/1.eot');/*اکسپلورر 9 به بعد*/
            src:local('bYekan'); /*بررسی نصب بودن فونت در سیستم کاربر*/
            local('b Yekan'); /*برای برخی از مرورگرها مانند سافاری*/
            url('/../font/3.woff') format('woff');/*مرورگر های جدید*/
            url('/../font/2.TFF') format('truetype');/*تمام مرورگرها به جزء اکسپلورر*/
            font-style:normal;
            font-weight:normal;
        }
        body{
            background : url('/../pic/back.jpg');
            font-family: BYekan, Tahoma, Geneva, sans-serif;
        }
        .brightness { filter: brightness(3.5); }
    </style>

</head>
<body>
    <div class ="row" style="direction: rtl">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xl-6">
            <img class="col-lg-6 col-md-6 col-sm-12 col-xl-12 brightness" src="{{ asset('../pic/alef-beLogo.png') }}" alt="logo"/>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light .navbar-toggleable navbar-brand"
         style="direction: rtl; width: 100%">
    <div>
        <ul class="nav navbar-nav navbar-left"  style="float: left">
            @if (Auth::guest())
                <li><a href="{{ route('login') }}" style=" color:black; text-decoration-line: none"> ورود </a></li>
                <!--<li><a href="{{ route('register') }}" style=" color:black; text-decoration-line: none"> ثبت نام</a></li>-->
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
        <ul class="nav navbar-nav navbar-right" role="navigation" style="float: right; text-align: right">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">
                            خانه
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/critic">
                            نقد کتاب
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/introduce">
                            معرفی کتاب
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/drafts">
                            دست نوشته ها
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teach">
                           مقالات آموزشی
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link disabled" href="#">--}}
{{--                            پرسش و پاسخ--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
                <form name="searchForm" class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="get" role="search">
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
<div style="background : #cbc9e1">
  @yield('content')  
</div>

</div>
</div>
</div>
<footer style="direction: rtl; background : #e9e9f5">
    <div style="width: 40%; float: right; text-align: right">
            <!--<a class="nav-link disabled" href="#">
               درباره من
            </a>-->
            <a class="nav-link" href="{{ route('mostViewd') }}">
                پربازدیدترین ها
            </a>
    </div>
    <div class="row" style="width : 50% ;text-align: right; direction: rtl">
        <div class="col-lg-6 col-sm-12">
            <p>با من در ارتباط باشید :</p>
            <a href="https://t.me/Shirazis0711"><img style="width: 40px; height: 40px" src="{{ asset('../pic/telegram.png') }}" /></a>
            <a href="https://twitter.com/H_Keyoumars"><img style="width: 40px; height: 40px" src="{{ asset('../pic/twitter.png') }}" /></a>

        </div>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
