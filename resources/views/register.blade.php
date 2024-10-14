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
                        <h1 class="h1">Register</h1>
                        <p>Sign up for an account by filling out the form below</p>
                    </div>
                    <form action="{{ route('postRegister') }}" method="post" data-form="validate">
                        @csrf
                        <div class="form-group">
                            <label>
                                <span>Fullname</span>
                                <input type="text" name="fullname" class="form-control">
                                @error('fullname')
                                    <span style="color:red;" class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span>Username</span>
                                <input type="text" name="username" class="form-control">
                                @error('username')
                                    <span style="color:red;" class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span>Email</span>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <span style="color:red;" class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span>Address</span>
                                <input type="text" name="address" class="form-control">
                                @error('address')
                                    <span style="color:red;" class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span>Password</span>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <span style="color:red;" class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <span>Confirm password</span>
                                <input type="password" name="confirm_password" id="" class="form-control">
                                @error('confirm_password')
                                    <span style="color:red;" class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="checkbox"> <label>
                                <input type="checkbox" name="rememberme">
                                <span>Remember me</span> </label> </div>

                        <button type="submit" class="btn btn-lg btn-block btn-primary">Register</button>

                        <p class="help-block clearfix">
                            <a href="{{ route('login') }}" class="btn-link pull-right">Do you have an account?</a>
                        </p>
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
            <li> <a href="#"> <i class="fa fa-youtube-play"></i> <span>Follow Us On Youtube Play</span> </a>
            </li>
            <li> <a href="#"> <i class="fa fa-linkedin"></i> <span>Follow Us On LinkedIn</span> </a> </li>
        </ul>
    </div>
    @include('client.layouts.partials.js')
</body>

</html>
