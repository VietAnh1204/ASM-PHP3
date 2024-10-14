@extends('client.layouts.master')

@section('title', 'Trang chủ')

@section('content')
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="row">
                        <!-- Bài mới nhất -->
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Bài viết mới nhất</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_world_news_posts">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </a>
                                    <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_world_news_posts">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner">
                                    @foreach($latestPosts as $index => $post)
                                        @if($index == 0)
                                            <li class="col-xs-12">
                                                <div class="post--item post--layout-1">
                                                    <div class="post--img">
                                                        <a href="{{ route('page.detail', $post->id) }}" class="thumb">
                                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                                        </a>
                                                        <a href="{{ route('page.list', $post->category_id) }}" class="cat">{{ $post->category_name }}</a>
                                                        <a href="#" class="icon"><i class="fa fa-flash"></i></a>
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
                                            <li class="col-xs-12">
                                                <hr class="divider">
                                            </li>
                                        @else
                                            <li class="col-xs-6">
                                                <div class="post--item post--layout-2">
                                                    <div class="post--img">
                                                        <a href="{{ route('page.detail', $post->id) }}" class="thumb">
                                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                                        </a>
                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">{{ $post->author ?? 'Unknown' }}</a></li>
                                                                <li><a href="#">{{ date('d F Y', strtotime($post->created_at)) }}</a></li>
                                                            </ul>
                                                            <div class="title">
                                                                <h3 class="h4"><a href="{{ route('page.detail', $post->id) }}" class="btn-link">{{ $post->title }}</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($index % 2 == 0 && $index != 4)
                                                <li class="col-xs-12">
                                                    <hr class="divider">
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <!-- Bài viết xem nhiều -->
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Bài viết xem nhiều</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_technology_posts">
                                        <i class="fa fa-long-arrow-left"></i>
                                    </a>
                                    <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_technology_posts">
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner">
                                    @foreach($mostViewedPosts as $index => $post)
                                        @if($index == 0)
                                            <li class="col-xs-12">
                                                <div class="post--item post--layout-1">
                                                    <div class="post--img">
                                                        <a href="{{ route('page.detail', $post->id) }}" class="thumb">
                                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                                        </a>
                                                        <a href="{{ route('page.list', $post->category_id) }}" class="cat">{{ $post->category_name }}</a>
                                                        <a href="#" class="icon"><i class="fa fa-heart-o"></i></a>
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
                                            <li class="col-xs-12">
                                                <hr class="divider">
                                            </li>
                                        @else
                                            <li class="col-xs-6">
                                                <div class="post--item post--layout-2">
                                                    <div class="post--img">
                                                        <a href="{{ route('page.detail', $post->id) }}" class="thumb">
                                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                                        </a>
                                                        <div class="post--info">
                                                            <ul class="nav meta">
                                                                <li><a href="#">{{ $post->author ?? 'Unknown' }}</a></li>
                                                                <li><a href="#">{{ date('d F Y', strtotime($post->created_at)) }}</a></li>
                                                            </ul>
                                                            <div class="title">
                                                                <h3 class="h4"><a href="{{ route('page.detail', $post->id) }}" class="btn-link">{{ $post->title }}</a></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if($index % 2 == 0 && $index != count($mostViewedPosts) - 1)
                                                <li class="col-xs-12">
                                                    <hr class="divider">
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        >

                        <div class="col-md-12 ptop--30 pbottom--30">
                            <!-- You can add an advertisement here -->
                        </div>

                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <!-- Your sidebar content goes here -->
                    @include('.client.layouts.partials.sidebar')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
