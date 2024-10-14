@extends('admin.layout')

@section('title', 'Chi tiết tin tức')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0">{{ $post->title }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow" style="max-height: 300px;">
                </div>
                <div class="col-md-8">
                    <h5 class="card-title text-primary">Mô tả</h5>
                    <p class="card-text">{{ $post->description }}</p>

                    <h5 class="card-title text-primary mt-4">Nội dung</h5>
                    <p class="card-text">{{ $post->content }}</p>

                    <div class="mt-4">
                        <p class="card-text"><strong>Lượt xem:</strong> <span class="badge bg-info">{{ $post->view }}</span></p>
                        <p class="card-text"><strong>Thể loại:</strong> <span class="badge bg-secondary">{{ $post->category->name }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left me-2"></i>Quay lại danh sách</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning"><i class="fas fa-edit me-2"></i>Chỉnh sửa</a>
        </div>
    </div>
</div>
@endsection
