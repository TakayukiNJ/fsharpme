<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head prefix="og: http://ogp.me/ns# website: http://ogp.me/ns/website#">
  @yield('head_chat')
  @yield('script')
</head>

<body class="search">
  @yield('nav_lp')
  @yield('headers')
  @yield('content')
</body>

<footer class="footer footer-black footer-big">
  @yield('footer')
</footer>

{{--<!-- Global site tag (gtag.js) - Google Analytics -->--}}
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113255449-1"></script>--}}
{{--<script>--}}
  {{--window.dataLayer = window.dataLayer || [];--}}
  {{--function gtag(){dataLayer.push(arguments);}--}}
  {{--gtag('js', new Date());--}}
  {{--gtag('config', 'UA-113255449-1');--}}
{{--</script>--}}

</html>
