@extends('admin.layout')

@section('title', 'Create Category')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection
