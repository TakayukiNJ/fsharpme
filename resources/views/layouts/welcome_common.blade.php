<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
{{--<html lang="ja">--}}
<head>
@yield('welcome_head')
</head>

<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
<!--<nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="500">-->
    @yield('nav_lp')
</nav>
@yield('welcome_content')

<footer class="footer footer-black footer-big">
@yield('footer')
</footer>
@yield('welcome_script')
</html>
