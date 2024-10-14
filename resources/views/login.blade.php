<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeLooks">
    <meta name="description" content="USNews - Multipurpose News and Magazine Template">
    <meta name="keywords"
        content="news, newspaper, magazine, blog, post, article, editorial, publishing, modern, responsive, html5, template">
    @include('client.layouts.partials.css')
</head>

<body>
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <div class="wrapper">
        <div class="login--section pd--100-0 bg--overlay" data-bg-img="{{ asset('client/img/login-img/bg.jpg') }}">
            <div class="container">
                <div class="login--form">
                    <div class="title">
                        <h1 class="h1">Login</h1>
                        <p>Login into account by fillup the below form</p>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('postLogin') }}" method="POST" data-form="validate">
                        @csrf
                        <div class="form-group"> <label> <span>Email Address</span>
                                <input type="email" name="email" class="form-control" required> </label> </div>

                        <div class="form-group"> <label> <span>Password</span>
                                <input type="password" name="password" class="form-control" required> </label> </div>

                        <div class="checkbox"> <label> <input type="checkbox" name="rememberme"> <span>Remember
                                    me</span> </label> </div><button type="submit"
                            class="btn btn-lg btn-block btn-primary">Login</button>
                        <p class="help-block clearfix"> <a href="#" class="btn-link pull-left">Forgot Username or
                                Password?</a> <a href="{{ route('Register') }}" class="btn-link pull-right">Create An
                                Account</a> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="stickySocial" class="sticky--right">
        <ul class="nav">
            <li> <a href="#"> <i class="fa fa-facebook"></i> <span>Follow Us On Facebook</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-twitter"></i> <span>Follow Us On Twitter</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-google-plus"></i> <span>Follow Us On Google Plus</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-rss"></i> <span>Follow Us On RSS</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-vimeo"></i> <span>Follow Us On Vimeo</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-youtube-play"></i> <span>Follow Us On Youtube Play</span> </a> </li>
            <li> <a href="#"> <i class="fa fa-linkedin"></i> <span>Follow Us On LinkedIn</span> </a> </li>
        </ul>
    </div>
    @include('client.layouts.partials.js')
</body>

</html>
