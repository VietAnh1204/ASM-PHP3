@extends('admin.layout')

@section('title', 'Danh sách bài viết')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Danh sách bài viết</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý bài viết</h6>
            <div>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tạo mới
                </a>
                <a href="{{ route('admin.posts.trashed') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-trash"></i> Thùng rác
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#ID</th>
                            <th>Tiêu đề</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Lượt xem</th>
                            <th>Danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $post->image) }}" width="60" alt="{{ $post->title }}" class="img-thumbnail">
                            </td>
                            <td>{{ Str::limit($post->description, 50) }}</td>
                            <td>{{ $post->view }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.posts.detail', $post->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
