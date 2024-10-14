<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -- @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            min-height: calc(100vh - 56px);
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .main-content {
            padding: 20px;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    @if (Auth::check())
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="rounded-circle me-2" width="32" height="32">
                        @else
                            <i class="fas fa-user-circle me-2" style="font-size: 32px;"></i>
                        @endif
                        <span class="fw-bold text-dark">{{ Auth::user()->username }}</span>
                    @else
                        <i class="fas fa-user-circle me-2" style="font-size: 32px;"></i>
                        <span class="fw-bold text-dark">Tài khoản</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    @if (Auth::check())
                        <a href="{{Route('profile')}}" class="dropdown-item">
                            <i class="fas fa-user me-2"></i>Thông tin
                        </a>
                        <a href="{{ route('password.change') }}" class="dropdown-item">
                            <i class="fas fa-key me-2"></i>Đổi mật khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </button>
                        </form>
                    @else
                        <a href="{{ route('postLogin') }}" class="dropdown-item">
                            <i class="fas fa-sign-in-alt me-2"></i>Đăng Nhập
                        </a>
                    @endif
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">




                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('page.home')}}"><i class="fas fa-globe me-1"></i>Web</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.posts.most-viewed') }}"><i class="fas fa-chart-line me-1"></i>Most Viewed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route ('admin.posts.index')}}"><i class="fas fa-file-alt me-1"></i>Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route ('admin.users.index')}}"><i class="fas fa-users me-1"></i>Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.comments.index') }}">
                                <i class="fas fa-comments me-1"></i>Comments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                                <i class="fas fa-folder me-1"></i>Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.posts.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Your Company Name
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
