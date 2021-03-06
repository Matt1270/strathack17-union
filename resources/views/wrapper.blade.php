<!DOCTYPE HTML>
<!-- -->
<html>
<head>
    <title>UNION index</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #myCarousel
        {
            margin-bottom: 20px;
        }
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body class="homepage">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="/"> <img src="/images/logo.png"> </a></h1>
                <span>University of Strathclyde Students' Association</span>
            </div>
        </header>

        <!-- Navigation -->
        <nav id="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li>
                    <a href="#">Browse category</a>
                    <ul>
                        @foreach(App\Categories::all() as $category)
                            <li>
                                <a href="/ads/category/{{$category->id}}">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>



                @if(Illuminate\Support\Facades\Auth::check())
                    <li><a href="/ads/submit">Post an ad</a></li>
                    <li>
                        <a href="#">Profile</a>
                        <ul>
                            <li><a href="/account">Manage settings</a></li>
                            <li><a href="/logout">Log out</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Log in</a></li>

                @endif



                <li id="search">
                    <form action="/ads/search-help" method="post">
                        <input type="text" name="searchKey" id="searchKey" placeholder="Search"/>

                        {{csrf_field()}}
                    </form>
                </li>
                </li>
            </ul>
        </nav>

        <!-- Features -->
        @if(isset($viewData->isIndex) && $viewData->isIndex)
        <div id="features-wrapper">
            <div class="container">
                <div class="row">
                @foreach(App\Ads::orderBy("created_at", "desc")->take(3)->get() as $ad)
                    <div class="4u 12u(medium)">
                        <section class="box feature">
                            <a href="ad_view" class="image featured"><img src="images/{{explode(";", $ad->pictureList)[0]}}" alt="" /></a>
                            <div class="inner">
                                <header>
                                    <h2><a href="/ads/{{$ad->id}}">{{$ad->title}}</a></h2>
                                    <p>{{$ad->category->name}}</p>
                                </header>
                                <p>{{$ad->breef}}</p>
                            </div>
                        </section>
                    </div>
                @endforeach
            </div>
            </div>
        </div>

        @endif

        @yield('tiles')


        <!-- Main -->
        <div id="main-wrapper">
            <div class="container">
                <div class="row 200%">

                    <div class="8u 12u(medium) important(medium)">

                        <!-- Content -->
                        <div id="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div id="footer-wrapper">
            <footer id="footer" class="container">
                <div class="row">
                    <div class="3u 6u(medium) 12u$(small)">
                        
                        <section class="widget contact last">
                            <h3>Contact Us</h3>
                            <ul>
                                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                                <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                            </ul>
                        </section>

                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <div id="copyright">
                            <ul class="menu">
                                <li> Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <!-- Scripts -->

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.dropotron.min.js"></script>
    <script src="/assets/js/skel.min.js"></script>
    <script src="/assets/js/util.js"></script>
    <script src="/assets/js/main.js"></script>

</body>
</html>