@extends('admin.layout')

@section('content')
    <h1>Quản lý Người dùng</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->active ? 'Hoạt động' : 'Không hoạt động' }}</td>
                    <td>
                        @if (Auth::id() !== $user->id || $user->role !== 'admin')
                            <form action="{{ route('admin.users.toggle-active', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $user->active ? 'btn-danger' : 'btn-success' }}">
                                    {{ $user->active ? 'Vô hiệu hóa' : 'Kích hoạt' }}
                                </button>
                            </form>
                        @else
                            <span class="text-muted">Không thể vô hiệu hóa</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
