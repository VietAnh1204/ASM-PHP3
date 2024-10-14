@extends('client.layouts.master')
@section('title', 'Cập nhật thông tin')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Thông tin cá nhân</h1>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="fullname" class="form-label">Họ và tên:</label>
            <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $user->fullname }}" required>
        </div>

        <div class="col-md-6">
            <label for="username" class="form-label">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="col-md-6">
            <label for="avatar" class="form-label">Ảnh đại diện:</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
        </div>

        <div class="col-md-6">
            @if($user->avatar)
                <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="img-thumbnail mt-3" width="100">
            @else
                <p class="mt-3">Chưa có ảnh đại diện</p>
            @endif
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
        </div>
    </form>
</div>
@endsection
