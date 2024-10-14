@extends('client.layouts.master')

@section('title', 'Search Results')

@section('content')
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="page--title pd--30-0">
                        <h2 class="h2">Search Results for: {{ $query }}</h2>
                    </div>

                    <div class="post--items post--items-5 pd--30-0">
                        <ul class="nav">
                            @foreach($posts as $post)
                            <li>
                                <div class="post--item post--title-larger">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                            <div class="post--img">
                                                <a href="{{ route('page.detail', $post->id) }}" class="thumb"><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"></a>
                                            </div>
                                        </div>

                                        <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="#">{{ $post->category_name }}</a></li>
                                                    <li><a href="#">{{ date('d M Y', strtotime($post->created_at)) }}</a></li>
                                                </ul>

                                                <div class="title">
                                                    <h3 class="h4"><a href="{{ route('page.detail', $post->id) }}" class="btn-link">{{ $post->title }}</a></h3>
                                                </div>
                                            </div>

                                            <div class="post--content">
                                                <p>{{ Str::limit($post->description, 100) }}</p>
                                            </div>

                                            <div class="post--action">
                                                <a href="{{ route('page.detail', $post->id) }}">Continue Reading...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{ $posts->links() }}
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
@endsection
