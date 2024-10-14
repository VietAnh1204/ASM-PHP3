<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Stay Connected</h2> <i class="icon fa fa-share-alt"></i>
    </div>
    <div class="social--widget style--2">
        <ul class="nav row gutter--20">
            <li class="col-md-12 facebook"> <a href="#"> <span class="icon"> <i class="fa fa-facebook"></i> <span>Share</span> </span> <span class="text"> <span>Facebook</span> <span>3.12 k</span> </span> </a> </li>
            <li class="col-md-12 twitter"> <a href="#"> <span class="icon"> <i class="fa fa-twitter"></i> <span>Tweet</span> </span> <span class="text"> <span>Twitter</span> <span>869</span> </span> </a> </li>
            <li class="col-md-12 google-plus"> <a href="#"> <span class="icon"> <i class="fa fa-google-plus"></i> <span>Share</span> </span> <span class="text"> <span>Google+</span> <span>639</span> </span> </a> </li>
            <li class="col-md-12 dribbble"> <a href="#"> <span class="icon"> <i class="fa fa-dribbble"></i> <span>Share</span> </span> <span class="text"> <span>Dribbble</span> <span>483</span> </span> </a> </li>
            <li class="col-md-12 linkedin"> <a href="#"> <span class="icon"> <i class="fa fa-linkedin"></i> <span>Share</span> </span> <span class="text"> <span>LinkedIn</span> <span>2.2 K</span> </span> </a> </li>
            <li class="col-md-12 pinterest"> <a href="#"> <span class="icon"> <i class="fa fa-pinterest-p"></i> <span>Pin it</span> </span> <span class="text"> <span>Pinterest</span> <span>493</span> </span> </a> </li>
        </ul>
    </div>
</div>

<!-- Get Newsletter -->
{{-- <div class="widget">
    <div class="widget--title">
        <h2 class="h4">Get Newsletter</h2> <i class="icon fa fa-envelope-open-o"></i>
    </div>
    <div class="subscribe--widget">
        <div class="content">
            <p>Subscribe to our newsletter to get latest news, popular news and exclusive updates.</p>
        </div>
        <form action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&amp;id=f4e0e93d1d" method="post" name="mc-embedded-subscribe-form" target="_blank" data-form="mailchimpAjax">
            <div class="input-group">
                <input type="email" name="EMAIL" placeholder="E-mail address" class="form-control" autocomplete="off" required>
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-lg btn-default active"><i class="fa fa-paper-plane-o"></i></button>
                </div>
            </div>
            <div class="status"></div>
        </form>
    </div>
</div> --}}

<!-- Featured News -->
<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Featured News</h2> <i class="icon fa fa-newspaper-o"></i>
    </div>
    <div class="list--widget list--widget-1">
        <div class="post--items post--items-3" data-ajax-content="outer">
            <ul class="nav" data-ajax-content="inner">
                @foreach($featuredPosts as $post)
                <li>
                    <div class="post--item post--layout-3">
                        <div class="post--img">
                            <a href="{{ route('page.detail', $post->id) }}" class="thumb">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            </a>
                            <div class="post--info">
                                <ul class="nav meta">
                                    <li><a href="#">{{ date('d F Y', strtotime($post->created_at)) }}</a></li>
                                </ul>
                                <div class="title">
                                    <h3 class="h4"><a href="{{ route('page.detail', $post->id) }}" class="btn-link">{{ $post->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

