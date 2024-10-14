@extends('admin.layout')

@section('title', 'Bài viết xem nhiều nhất')

@section('content')
    <h1>Top 5 bài viết xem nhiều nhất</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Lượt xem</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mostViewedPosts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->view }}</td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
