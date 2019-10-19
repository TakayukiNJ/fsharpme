<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@yield('head')
</head>

<body class="presentation-page loading">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
    <!--<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">-->
    <!--<nav class="navbar navbar-expand-lg fixed-top nav-down">-->
    <!--<nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down bg-success" color-on-scroll="220">-->
    @yield('nav_lp')
    </nav>
    @yield('body_headers')
    @yield('content')

</body>

<footer class="footer footer-black footer-big">
@yield('footer')
</footer>
@yield('script')
</html>

