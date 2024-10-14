{{-- <nav>
    <a class="abc" href="/">Trang chủ</a> |
    <a class="abc" href="/user/123">User</a> |
    <a href="">Trang admin</a> |

    <!--Danh sách category-->
    @foreach ($categories as $cate)
        <a href="{{ route('page.list', $cate->id) }}">{{ $cate->name }}</a> |
    @endforeach
</nav> --}}
<div class="posts--filter-bar style--1 hidden-xs">
    <div class="container">
        <ul class="nav">
            <li> <a href="#"> <i class="fa fa-star-o"></i> <span>Featured News</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-heart-o"></i> <span>Most Popular</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-fire"></i> <span>Hot News</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-flash"></i> <span>Trending News</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-eye"></i> <span>Most Watched</span> </a> </li>
        </ul>
    </div>
</div>

<div class="news--ticker">
    <div class="container">
        <div class="title">
            <h2>News Updates</h2> <span>(Update 12 minutes ago)</span>
        </div>
        <div class="news-updates--list" data-marquee="true">
            <ul class="nav">
                <li>
                    <h3 class="h3"><a href="#">Contrary to popular belief Lorem Ipsum is not simply random
                            text.</a></h3>
                </li>
                <li>
                    <h3 class="h3"><a href="#">Education to popular belief Lorem Ipsum is not simply</a></h3>
                </li>
                <li>
                    <h3 class="h3"><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a></h3>
                </li>
                <li>
                    <h3 class="h3"><a href="#">Corporis repellendus perspiciatis reprehenderit.</a></h3>
                </li>
                <li>
                    <h3 class="h3"><a href="#">Deleniti consequatur laudantium sit aspernatur?</a></h3>
                </li>
            </ul>
        </div>
    </div>
</div>
