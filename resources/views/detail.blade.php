


@extends('client.layouts.master')

@section('title', $post->title)

@section('content')
    <div class="wrapper">
        <div class="main-content--section pbottom--30">
            <div class="container">
                <div class="row">
                    <div class="main--content col-md-8" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            <div class="post--item post--single post--title-largest pd--30-0">
                                <!-- Existing post content -->
                                <div class="post--info">
                                    <div class="title">
                                        <h2 class="h4">{{ $post->title }}</h2>
                                    </div>
                                    <ul class="nav meta">
                                        {{-- <li><a href="#">Norma R. Hogan</a></li> --}}
                                        <li><a href="#">{{ date('d F Y', strtotime($post->created_at)) }}</a></li>
                                        <li><span><i class="fa fm fa-eye"></i> {{ $post->view }} Views</span></li>
                                        <li><a href="#"><i class="fa fm fa-comments-o"></i>02</a></li>
                                    </ul>
                                    <div class="post--img">
                                        <a href="#" class="thumb">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                                        </a>
                                        <a href="#" class="icon"><i class="fa fa-star-o"></i></a>
                                        <div class="post--map">
                                            <p class="btn-link"><i class="fa fa-map-o"></i> {{ $post->category_name }}</p>
                                            <div class="map--wrapper">
                                                <div data-map-latitude="23.790546" data-map-longitude="90.375583"
                                                    data-map-zoom="6" data-map-marker="[[23.790546, 90.375583]]"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post--content">
                                        <p>{{ $post->description }}</p>
                                        <h4>Where does it come from?</h4>
                                        <p>{{ $post->content }}</p>
                                    </div>
                                </div>
                                <!-- Comment section -->
                                <div class="comment--list pd--30-0">
                                    <div class="post--items-title">
                                        <h2 class="h4">{{ $post->comments->count() }} Comments</h2>
                                        <i class="icon fa fa-comments-o"></i>
                                    </div>
                                    <ul class="comment--items nav">
                                        @foreach($post->comments as $comment)
                                            <li>
                                                <div class="comment--item clearfix">
                                                    <div class="comment--img float--left">
                                                        @if($comment->user && $comment->user->avatar)
                                                            <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="{{ $comment->user->name }}">
                                                        @else
                                                            <img src="{{ asset('img/default-avatar.jpg') }}" alt="Default Avatar">
                                                        @endif
                                                    </div>

                                                    <div class="comment--info">
                                                        <div class="comment--header clearfix">
                                                            <p class="name">{{ $comment->user->name ?? 'Unknown User' }}</p>
                                                            <p class="date">{{ $comment->created_at->format('d M Y \a\t h:i a') }}</p>
                                                        </div>
                                                        <div class="comment--content">
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Comment form -->
                                @auth
                                <div class="comment--form pd--30-0">
                                    <h4 class="h4">Leave a Comment</h4>
                                    <form action="{{ route('comments.store', $post) }}" method="POST">
                                        @csrf
                                        <div style="border: 1px solid rgba(185, 185, 185, 0.396);">
                                            <textarea name="content" rows="4" class="form-control" required></textarea>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </div>

                                @else
                                    <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                        <div class="sticky-content-inner">
                            @include('client.layouts.partials.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
