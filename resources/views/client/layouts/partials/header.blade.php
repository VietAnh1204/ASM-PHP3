<div class="header--topbar bg--color-2">
    <div class="container">
        <div class="float--left float--xs-none text-xs-center">
            <ul class="header--topbar-info nav">
                <li><i class="fa fm fa-map-marker"></i>Hà Nội</li>
                <li><i class="fa fm fa-mixcloud"></i>16<sup>0</sup> C</li>
                <li><i class="fa fm fa-calendar"></i>Today (Sunday 15 Octorber 2024)</li>
            </ul>
        </div>

        {{-- Login/Register --}}

        <div class="float--right float--xs-none text-xs-center">
            <ul class="header--topbar-action nav">
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                            {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile') }}" style="background: none; border: none; width: 100%; text-align: left; padding: 3px 20px; color:black">Profile</a></li>
                            @if(Auth::user()->role === 'admin')
                                <li><a href="{{ route('admin.posts.index') }}" style="background: none; border: none; width: 100%; text-align: left; padding: 3px 20px; color:black">Quản lý</a></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; width: 100%; text-align: left; padding: 3px 20px; color:red">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ Route('login') }}"><i class="fa fm fa-user-o"></i>Login/Register</a></li>
                @endauth
            </ul>


            <ul class="header--topbar-lang nav">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fm fa-language"></i>English<i class="fa flm fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">English</a></li>
                        <li><a href="#">Tiếng Việt</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="header--topbar-social nav hidden-sm hidden-xxs">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="header--mainbar">
    <div class="container">
        <div class="header--logo float--left float--sm-none text-sm-center">
            <h1 class="h1"> <a href="{{Route('page.home')}}" class="btn-link"> <img src="{{asset('client/img/logo.png')}}" alt="USNews Logo"> <span
                        class="hidden">USNews Logo</span> </a> </h1>
        </div>
        <div class="header--ad float--right float--sm-none hidden-xs"> <a href="#"> <img
                    src="{{asset('client/img/ads-img/ad-728x90-01.jpg')}}" alt="Advertisement"> </a> </div>
    </div>
</div>
<div class="header--navbar navbar bd--color-1 bg--color-1" data-trigger="sticky">
    <div class="container">
        <div class="navbar-header"> <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#headerNav" aria-expanded="false" aria-controls="headerNav"> <span class="sr-only">Toggle
                    Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
            </button> </div>
        <div id="headerNav" class="navbar-collapse collapse float--left">
            <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                <li class="dropdown">
                    <a href="{{Route('page.home')}}" class="dropdown-toggle">Home</a>
                </li>
                <li class="dropdown megamenu filter"> <a href="world-news.html" class="dropdown-toggle"
                        data-toggle="dropdown">Worlds News<i class="fa flm fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="megamenu--filter">
                                        <ul class="nav">
                                            <li class="active"> <a href="#" data-action="load_cat_posts"
                                                    data-cat="all">All<i class="fa fa-angle-right"></i></a>
                                            </li>
                                            <li> <a href="#" data-action="load_cat_posts"
                                                    data-cat="latin-america">Latitn America<i
                                                        class="fa fa-angle-right"></i></a> </li>
                                            <li> <a href="#" data-action="load_cat_posts"
                                                    data-cat="africa">Africa<i class="fa fa-angle-right"></i></a>
                                            </li>
                                            <li> <a href="#" data-action="load_cat_posts"
                                                    data-cat="middle-east">Middle East<i
                                                        class="fa fa-angle-right"></i></a> </li>
                                            <li> <a href="#" data-action="load_cat_posts"
                                                    data-cat="europe">Europe<i class="fa fa-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="megamenu--posts" data-ajax-content="outer">
                                        <ul class="row" data-ajax-content="inner">
                                            <li class="col-md-3">
                                                <div class="img"> <a href="news-single-v1.html" class="thumb">
                                                        <img src="img/megamenu-img/post-01.jpg" alt=""> </a>
                                                    <a href="#" class="cat">Beach</a> <a href="#"
                                                        class="icon"><i class="fa fa-eye"></i></a>
                                                </div><a href="news-single-v1.html" class="title">It is a long
                                                    established fact that a reader will be distracted by</a>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="img"> <a href="news-single-v1.html" class="thumb">
                                                        <img src="img/megamenu-img/post-02.jpg" alt=""> </a>
                                                    <a href="#" class="cat">News</a> <a href="#"
                                                        class="icon"><i class="fa fa-star-o"></i></a>
                                                </div>
                                                <a href="news-single-v1.html" class="title">It is a long
                                                    established fact that a reader will be distracted by</a>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="img"> <a href="news-single-v1.html" class="thumb">
                                                        <img src="img/megamenu-img/post-03.jpg" alt=""> </a>
                                                    <a href="#" class="cat">Ice Hiking</a> <a href="#"
                                                        class="icon"><i class="fa fa-flash"></i></a>
                                                </div>
                                                <a href="news-single-v1.html" class="title">It is a long
                                                    established fact that a reader will be distracted by</a>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="img"> <a href="news-single-v1.html" class="thumb">
                                                        <img src="img/megamenu-img/post-04.jpg" alt=""> </a>
                                                    <a href="#" class="cat">Mountain</a> <a href="#"
                                                        class="icon"><i class="fa fa-heart-o"></i></a>
                                                </div><a href="news-single-v1.html" class="title">It is a
                                                    long established fact that a reader will be distracted
                                                    by</a>
                                            </li>
                                        </ul>
                                        <div class="preloader bg--color-0--b" data-preloader="1">
                                            <div class="preloader--inner"></div>
                                        </div>
                                    </div>
                                    <div class="megamenu--pagination" data-ajax="tab"> <a href="#"
                                            class="prev" data-ajax-action="load_prev_posts"> <i
                                                class="fa fa-long-arrow-left"></i> </a> <a href="world-news.html"
                                            class="all" title="View All" data-toggle="tooltip"> <i
                                                class="fa fa-th-large"></i> </a> <a href="#" class="next"
                                            data-ajax-action="load_next_posts"> <i class="fa fa-long-arrow-right"></i>
                                        </a> </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="national.html">National</a></li>
                <li><a href="financial.html">Financial</a></li>
                <li><a href="entertainment.html">Entertainment</a></li>
                <li><a href="lifestyle.html">Lifestyle</a></li>
                <li><a href="technology.html">Technology</a></li>
                <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle"
                        data-toggle="dropdown">Travel<i class="fa flm fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="megamenu--posts" data-ajax-content="outer">
                                <ul class="row" data-ajax-content="inner">
                                    <li class="col-md-3">
                                        <div class="img"> <a href="news-single-v1.html" class="thumb"> <img
                                                    src="img/megamenu-img/post-01.jpg" alt=""> </a> <a
                                                href="#" class="cat">Beach</a> <a href="#"
                                                class="icon"><i class="fa fa-eye"></i></a> </div><a
                                            href="news-single-v1.html" class="title">It is a long
                                            established fact that a reader will be distracted by</a>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="img"> <a href="news-single-v1.html" class="thumb"> <img
                                                    src="img/megamenu-img/post-02.jpg" alt=""> </a> <a
                                                href="#" class="cat">News</a> <a href="#"
                                                class="icon"><i class="fa fa-star-o"></i></a> </div><a
                                            href="news-single-v1.html" class="title">It is a long
                                            established fact that a reader will be distracted by</a>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="img"> <a href="news-single-v1.html" class="thumb"> <img
                                                    src="img/megamenu-img/post-03.jpg" alt=""> </a> <a
                                                href="#" class="cat">Ice Hiking</a> <a href="#"
                                                class="icon"><i class="fa fa-flash"></i></a> </div><a
                                            href="news-single-v1.html" class="title">It is a long
                                            established fact that a reader will be distracted by</a>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="img"> <a href="news-single-v1.html" class="thumb"> <img
                                                    src="img/megamenu-img/post-04.jpg" alt=""> </a> <a
                                                href="#" class="cat">Mountain</a> <a href="#"
                                                class="icon"><i class="fa fa-heart-o"></i></a> </div><a
                                            href="news-single-v1.html" class="title">It is a long
                                            established fact that a reader will be distracted by</a>
                                    </li>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                            <div class="megamenu--pagination" data-ajax="tab"> <a href="#" class="prev"
                                    data-ajax-action="load_prev_posts"> <i class="fa fa-long-arrow-left"></i> </a> <a
                                    href="travel.html" class="all" title="View All" data-toggle="tooltip"> <i
                                        class="fa fa-th-large"></i> </a> <a href="#" class="next"
                                    data-ajax-action="load_next_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="sports.html">Sports</a></li>
                <li class="dropdown megamenu"> <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown">Catagory<i class="fa flm fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown"> <a href="#">World’s News</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">US &amp; Canada</a></li>
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">Africa</a></li>
                                <li><a href="#">Asia</a></li>
                                <li><a href="#">Middle East</a></li>
                                <li><a href="#">Asia Pacific</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Documantation</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Featured Documantation</a></li>
                                <li><a href="#">People &amp; Power</a></li>
                                <li><a href="#">Rebel Education</a></li>
                                <li><a href="#">Rewind</a></li>
                                <li><a href="#">Fault Lines</a></li>
                                <li><a href="#">News 360 Degree World’s</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Sports</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Football</a></li>
                                <li><a href="#">Cricket</a></li>
                                <li><a href="#">Hocky</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Business</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">US Business</a></li>
                                <li><a href="#">Middle East Business</a></li>
                                <li><a href="#">Europe Business</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Education</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Africa Child Education</a></li>
                                <li><a href="#">Bangladeshi Education</a></li>
                                <li><a href="#">Middle East Education</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Humanities</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Help For Syrian Refugees</a></li>
                                <li><a href="#">Help For Afgan Children</a></li>
                                <li><a href="#">Help For African Children</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Movies</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Hollywood</a></li>
                                <li><a href="#">Dollywood</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Weather</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">North Pole</a></li>
                                <li><a href="#">South Pole</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Health</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Africa Poor Child Healt</a></li>
                                <li><a href="#">Fitness and Health</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="#">Animals</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">African Animals</a></li>
                                <li><a href="#">Australian Animals</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <form action="{{ route('client.search') }}" method="GET" class="header--search-form float--right">
            <input type="search" name="query" placeholder="Tìm kiếm..." class="header--search-control form-control" required>
            <button type="submit" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
        </form>


    </div>
</div>
