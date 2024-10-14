<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeLooks">
    <meta name="description" content="USNews - Multipurpose News and Magazine Template">
    <meta name="keywords"content="news, newspaper, magazine, blog, post, article, editorial, publishing, modern, responsive, html5, template">
    @include('client.layouts.partials.css')
    <title>@yield('title')</title>
</head>

<body>
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <div class="wrapper">
        <header class="header--section header--style-1">
            @include('client.layouts.partials.header');
            @include('client.layouts.partials.header-nav');
        </header>
    </div>


    @yield('content')

        <footer class="footer--section">
    @include('client.layouts.partials.footer')
</footer>

        @include('client.layouts.partials.js')
</body>

</html>
