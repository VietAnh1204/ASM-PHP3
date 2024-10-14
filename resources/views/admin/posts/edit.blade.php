@extends('admin.layout')
@section('title', 'Sửa bài viết')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><i class="fas fa-edit me-2"></i>Sửa bài viết</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <div class="input-group">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <span class="input-group-text">Hình ảnh hiện tại</span>
                    </div>
                    <img src="{{ Storage::url($post->image) }}" alt="Current Image" class="img-thumbnail mt-2" style="max-height: 100px;">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $post->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea name="content" id="content" class="form-control" rows="6" required>{{ $post->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="view" class="form-label">Lượt xem</label>
                    <input type="number" name="view" id="view" class="form-control" value="{{ $post->view }}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach ($categories as $cate)
                            <option value="{{ $cate->id }}" @selected($cate->id == $post->category_id)>{{ $cate->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i>Cập nhật bài viết</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
